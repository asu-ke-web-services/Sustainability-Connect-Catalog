import React from 'react';
import { connectHits, Highlight } from 'react-instantsearch-dom';
import PropTypes from 'prop-types';
import moment from 'moment';
import { AffiliationIcons } from './AffiliationIcons';

export const Hits = connectHits(({ hits, indexName, userAccessAffiliations, canViewRestricted }) => {
  const hs = hits.map(
    hit => <HitComponent
      key={hit.objectID}
      hit={hit}
      indexName={indexName}
      userAccessAffiliations={userAccessAffiliations}
      canViewRestricted={canViewRestricted}
    />);
  return <tbody id="hits">{hs}</tbody>;
});

HitComponent.propTypes = {
  hit: PropTypes.object,
  indexName: PropTypes.string,
  userAccessAffiliations: PropTypes.array,
  canViewRestricted: PropTypes.bool
};

function HitComponent({ hit, indexName, userAccessAffiliations, canViewRestricted }) {

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
  if (moment(hit.applicationDeadline).isValid()) {
    deadline = moment(hit.applicationDeadline).format('YYYY-MM-DD');
  } else {
    deadline = hit.applicationDeadline;
  }

  if (indexName === 'internships') {
    if (canView) {
      return (
        <tr className="disabled">
          <td>View Restricted: {canView}</td>
          <td>View Restricted</td>
          <td>{hit.affiliationIcons != null
              ? <AffiliationIcons canView={canView} icons={hit.affiliationIcons.filter(Boolean)} />
              : ''}</td>
          <td>{deadline}</td>
        </tr>
      );
    }

    return (
      <tr>
        <td><a href={`/internship/${hit.id}`}><Highlight attribute="name" hit={hit} /></a></td>
        <td>{hit.organizationName}</td>
        <td>{hit.affiliationIcons != null
            ? <AffiliationIcons icons={hit.affiliationIcons.filter(Boolean)} />
            : ''}</td>
        <td>{deadline}</td>
      </tr>
    );
  }

  // Render Project view

  if (canView) {
    return (
      <tr className="disabled">
        <td>View Restricted</td>
        <td>{hit.affiliationIcons != null
            ? <AffiliationIcons icons={hit.affiliationIcons.filter(Boolean)} />
            : ''}</td>
        <td><Highlight attribute="locations" hit={hit} /></td>
        <td>{deadline}</td>
        <td>{hit.startDate != null
            ? moment(hit.startDate.date).format('YYYY-MM-DD')
            : ''}</td>
        <td>{hit.endDate != null
            ? moment(hit.endDate.date).format('YYYY-MM-DD')
            : ''}</td>
      </tr>
    );
  }

  return (
    <tr>
      <td><a href={`/project/${hit.id}`}><Highlight attribute="name" hit={hit} /></a></td>
      <td>{hit.affiliationIcons != null
          ? <AffiliationIcons icons={hit.affiliationIcons.filter(Boolean)} />
          : ''}</td>
      <td><Highlight attribute="locations" hit={hit} /></td>
      <td>{deadline}</td>
      <td>{hit.startDate != null
          ? moment(hit.startDate.date).format('YYYY-MM-DD')
          : ''}</td>
      <td>{hit.endDate != null
          ? moment(hit.endDate.date).format('YYYY-MM-DD')
          : ''}</td>
    </tr>
  );
}

