import React from 'react';
import { connectHits, Highlight } from 'react-instantsearch-dom';
import PropTypes from 'prop-types';
import moment from 'moment';
import unescape from 'unescape';
import { AffiliationIcons } from './AffiliationIcons';

export const ProjectHits = connectHits(({ hits, userAccessAffiliations, canViewRestricted }) => {
  const hs = hits.map(
    hit => <HitComponent
      key={hit.objectID}
      hit={hit}
      userAccessAffiliations={userAccessAffiliations}
      canViewRestricted={canViewRestricted}
    />);
  return <tbody id="hits">{hs}</tbody>;
});

HitComponent.propTypes = {
  hit: PropTypes.object,
  userAccessAffiliations: PropTypes.array,
  canViewRestricted: PropTypes.bool
};

function HitComponent({ hit, userAccessAffiliations, canViewRestricted }) {

  // check for access restrictions; if present, check if user has access
  // access determined by user permissions or possessing same access affiliations
  let canView = (
    hit.accessAffiliations != null &&
    hit.accessAffiliations.length > 0 &&
    ! canViewRestricted &&
    (
      userAccessAffiliations == null ||
      ! userAccessAffiliations.some(v => hit.accessAffiliations.indexOf(v))
    )
  );

  // format application_deadline, which might be a text string or a date
  let deadline = '';
  if (hit.applicationDeadlineAt != null) {
    deadline = moment.unix(hit.applicationDeadlineAt).format('ll');
  } else {
    deadline = '';
  }
  // deadline = moment(hit.applicationDeadlineAt).format('ll');

  let startDate = '';
  if (hit.opportunityStartAt != null) {
    startDate = moment.unix(hit.opportunityStartAt).format('ll');
  } else {
    startDate = '';
  }

  let endDate = '';
  if (hit.opportunityEndAt != null) {
    endDate = moment.unix(hit.opportunityEndAt).format('ll');
  } else {
    endDate = '';
  }


  if (canView) {
    return (
      <tr className="disabled">
        <td>View Restricted for Sustainability majors only</td>
        <td>{hit.affiliationIcons != null
            ? <AffiliationIcons icons={hit.affiliationIcons.filter(Boolean)} />
            : ''}</td>
        <td>{hit.locations}</td>
        <td>{startDate}</td>
        <td>{endDate}</td>
        <td>{deadline}</td>
      </tr>
    );
  }

  return (
    <tr>
      <td><a href={`/project/${hit.id}`}>{unescape(hit.name)}</a></td>
      <td>{hit.affiliationIcons != null
          ? <AffiliationIcons icons={hit.affiliationIcons.filter(Boolean)} />
          : ''}</td>
      <td>{hit.locations}</td>
      <td>{startDate}</td>
      <td>{endDate}</td>
      <td>{deadline}</td>
    </tr>
  );
}

