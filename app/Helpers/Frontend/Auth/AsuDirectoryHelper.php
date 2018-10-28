<?php

namespace SCCatalog\Helpers\Frontend\Auth;

use GuzzleHttp\Client;
use SCCatalog\Exceptions\GeneralException;

/**
 *  AsuDirectoryHelper
 *
 *  This is a class for interacting with the ASU iSearch service.
 *  To display an ASU iSearch profile, you need their EID (Employee ID?):
 *  https://isearch.asu.edu/profile/{EID}
 *
 *  Profile data can be retrieved as XML and JSON:
 *  to find out about a person given an asurite:
 *  https://asudir-solr.asu.edu/asudir/directory/select?q=asuriteId:{ASURITE}&wt=json
 *  https://asudir-solr.asu.edu/asudir/directory/select?q=asuriteId:{ASURITE}&wt=xml
 *
 *  Thus, in order to access a user's iSearch profile page when you have their ASURITE,
 *  such as provided by the ASU CAS service, their EID must be retrieved using the XML or JSON service.
 */
class AsuDirectoryHelper {

    /**
     * Get user's iSearch record using their ASURITE id
     *
     * @param String $asurite
     * @return array
     */
    public static function getDirectoryInfoByAsurite($asurite) : array
    {
        if ( $asurite === NULL || \strlen( $asurite ) < 3 || \strlen( $asurite ) > 12 ) {
            return NULL;
        }
        $asurite = urlencode( $asurite );

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://asudir-solr.asu.edu/asudir/directory/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', 'select?q=asuriteId:' . $asurite . '&wt=json' );

        $code = $response->getStatusCode();

        if ($code === 200) {
            $json = $response->getBody();
        } else {
            throw new GeneralException($response->getReasonPhrase());
        }

        if ( empty( $json ) ) {
            return NULL;
        }
        $info = json_decode ( $json, true );
        if ( 0 == $info['response']['numFound'] ) {
            return NULL;
        }
        return $info;
    }

    /**
     * Get user's EID from iSearch array
     *
     * @param  array   $info
     * @return Integer
     */
    public static function getEid( $info ) : int
    {
        if ( isset( $info['response']['docs'][0]['eid'] ) ) {
            return (int) $info[ 'response' ][ 'docs' ][ 0 ][ 'eid' ];
        }
        return '';
    }

    /**
     * Get user's ASURITE from iSearch array
     *
     * A bit redundant, since we currently only retrieve the iSearch info using the ASURITE as key,
     * but alternate key options may be useful later, making this method useful.
     *
     * @param  array   $info
     * @return string
     */
    public static function getAsurite( $info ) : string
    {
        if ( isset( $info['response']['docs'][0]['asuriteId'] ) ) {
            return (string) $info[ 'response' ][ 'docs' ][ 0 ][ 'asuriteId' ];
        }
        return '';
    }

    /**
     * Get user's full, display name from iSearch array
     *
     * @param  array $info
     * @return string
     */
    public static function getDisplayName($info) : string
    {
        if ( isset( $info['response']['docs'][0]['displayName'] ) ) {
            return (string) $info[ 'response' ][ 'docs' ][ 0 ][ 'displayName' ];
        }
        return '';
    }

    /**
     * Get user's last name from iSearch array
     *
     * @param  array   $info
     * @return string
     */
    public static function getLastName($info) : string
    {
        if ( isset( $info['response']['docs'][0]['lastName'] ) ) {
            return (string) $info[ 'response' ][ 'docs' ][ 0 ][ 'lastName' ];
        }
        return '';
    }

    /**
     * Get user's first name from iSearch array
     *
     * @param  array   $info
     * @return string
     */
    public static function getFirstName($info) : string
    {
        if ( isset( $info['response']['docs'][0]['firstName'] ) ) {
            return (string) $info[ 'response' ][ 'docs' ][ 0 ][ 'firstName' ];
        }
        return '';
    }

    /**
     * Get user's email address from iSearch array
     *
     * @param  array   $info
     * @return string
     */
    public static function getEmail($info) : string
    {
        if ( isset( $info['response']['docs'][0]['emailAddress'] ) ) {
            return (string) $info[ 'response' ][ 'docs' ][ 0 ][ 'emailAddress' ];
        }
        return '';
    }

    /**
     * Return T/F whether a user is listed as a student in iSearch
     *
     * @param  array   $info
     * @return string
     */
    public static function isStudent( $info ) : string
    {
        if ( isset( $info['response']['docs'][0]['affiliations'] ) ) {
            foreach ( $info['response']['docs'][0]['affiliations'] as $affiliation ) {
                if ( 'Student' === $affiliation ) {
                    return TRUE;
                }
            }
        }
        return FALSE;
    }

    /**
     * Return T/F whether a user is listed as faculty in iSearch
     *
     * @param  array   $info
     * @return string
     */
    public static function isFaculty( $info ) : string
    {
        if ( isset( $info['response']['docs'][0]['affiliations'] ) ) {
            foreach ( $info['response']['docs'][0]['affiliations'] as $affiliation ) {
                if ( 'Employee' === $affiliation ) {
                    foreach ( $info['response']['docs'][0]['emplClasses'] as $employee_class ) {
                        if ( 'Faculty' === $employee_class ) {
                            return TRUE;
                        }
                    }
                }
            }
        }
        return FALSE;
    }

    /**
     * Return T/F whether a user is listed as staff in iSearch
     *
     * Specifically, this function searches for the 'Employee' affiliation AND 'University Staff' employee classification.
     * Student workers and Graduate Assistants have the employee affiliation in addition to their Student affiliation,
     * but they have a different employee classification.
     *
     * @param  array   $info
     * @return string
     */
    public static function isStaff( $info ) : string
    {
        if ( isset( $info['response']['docs'][0]['affiliations'] ) ) {
            foreach ( $info['response']['docs'][0]['affiliations'] as $affiliation ) {
                if ( 'Employee' === $affiliation ) {
                    foreach ( $info['response']['docs'][0]['emplClasses'] as $employee_class ) {
                        if ( 'University Staff' === $employee_class ) {
                            return TRUE;
                        }
                    }
                }
            }
        }
        return FALSE;
    }

    /**
     * Get user's ASU primary affiliation/status (student, faculty, staff) from iSearch array
     *
     * This is a somewhat personalised function written for Sustainability Connect's (sustainabilityconnect.asu.edu) needs.
     * Just in case a university staff user might also be classified as a student if they are enrolled for students,
     * this function prioritises employee classification: Student > Faculty > Staff.
     *
     * @param  array   $info
     * @return string
     */
    public static function getUserType( $info ) : ?string
    {
        $student = FALSE;
        $faculty = FALSE;
        $staff = FALSE;
        if ( isset( $info['response']['docs'][0]['affiliations'] ) ) {
            foreach ( $info['response']['docs'][0]['affiliations'] as $affiliation ) {
                if ( 'Student' === $affiliation ) {
                    $student = TRUE;
                }
                if ( 'Employee' === $affiliation ) {
                    foreach ( $info['response']['docs'][0]['emplClasses'] as $employee_class ) {
                        if ( 'Faculty' === $employee_class ) {
                            $faculty = TRUE;
                        } elseif ( 'University Staff' === $employee_class ) {
                            $staff = TRUE;
                        }
                    }
                }
            }
        }
        // in case, user has multiple classifications (staff enrolled as student)
        // role precedence: student > faculty > staff
        if ( $student ) {
            return 'student';
        }
        if ( $faculty ) {
            return 'faculty';
        }
        if ( $staff ) {
            return 'staff';
        }
        return FALSE;
    }

    /**
     * Return T/F whether a user is listed in iSearch as majoring in a degree program from the School of Sustainability
     *
     * @param  array   $info
     * @return string
     */
    public static function hasSosPlan( $info ) : string
    {
        if ( $info['response']['numFound'] > 0 ) {
            if ( !empty( $info['response']['docs'][0]['programs'] ) ) {
                foreach ( $info['response']['docs'][0]['programs'] as $program ) {
                    // look for SOS program
                    if ( 'School of Sustainability' === $program ) {
                        foreach ( $info['response']['docs'][0]['majors'] as $major ) {
                            // is student majoring in Sustainability
                            if ( 'Sustainability' === $major ) {
                                return TRUE;
                            }
                        }
                    }
                }
            }
        }

        return FALSE;
    }
}
