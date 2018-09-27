import React from 'react';
import { connectHits, Highlight } from 'react-instantsearch-dom';
import PropTypes from 'prop-types';
import moment from 'moment';
import { AffiliationIcons } from './AffiliationIcons';

export const Hits = connectHits(({ hits, indexName }) => {
  const hs = hits.map(hit => <HitComponent key={hit.objectID} hit={hit} indexName={indexName} />);
  return <tbody id="hits">{hs}</tbody>;
});

HitComponent.propTypes = {
  hit: PropTypes.object,
  indexName: PropTypes.string,
};

function HitComponent({ hit, indexName }) {
  if (indexName === 'internships') {
    return (
      <tr>
        <td>
          <a href={`/project/${hit.id}`}>
            <Highlight attribute="name" hit={hit} />
          </a>
        </td>
        <td>
          {hit.organizationName}
        </td>
        <td>
          {hit.affiliationIcons !== null
            ? <AffiliationIcons icons={hit.affiliationIcons.filter(Boolean)} />
            : ''}
        </td>
        <td>
          {hit.applicationDeadline !== null
            ? moment(hit.applicationDeadline).format('YYYY-MM-DD')
            : ''}
        </td>
      </tr>
    );
  }

  return (
    <tr>
      <td>
        <a href={`/project/${hit.id}`}>
          <Highlight attribute="name" hit={hit} />
        </a>
      </td>
      <td>
        {hit.affiliationIcons !== null
          ? <AffiliationIcons icons={hit.affiliationIcons.filter(Boolean)} />
          : ''}
      </td>
      <td>
        <Highlight attribute="locations" hit={hit} />
      </td>
      <td>
        {hit.applicationDeadline !== null
          ? moment(hit.applicationDeadline).format('YYYY-MM-DD')
          : ''}
      </td>
      <td>
        {hit.startDate !== null
          ? moment(hit.startDate.date).format('YYYY-MM-DD')
          : ''}
      </td>
      <td>
        {hit.endDate !== null
          ? moment(hit.endDate.date).format('YYYY-MM-DD')
          : ''}
      </td>
    </tr>
  );
}

