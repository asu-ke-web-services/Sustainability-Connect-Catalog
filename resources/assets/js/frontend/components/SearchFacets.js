import React from 'react';
import {
  ClearRefinements,
  connectRefinementList,
} from 'react-instantsearch-dom';

const RefinementListLinks = connectRefinementList(
  ({ items, refine, createURL }) => {
    const hitComponents = items.map(item => (
      <div className={item.isRefined ? ' active' : ''} key={item.label}>
        <a
          className="item"
          href={createURL(item.value)}
          onClick={e => {
            e.preventDefault();
            refine(item.value);
          }}
        >
          <span> {item.label}</span>
          <span className="badge pull-right">{item.count}</span>
        </a>
      </div>
    ));

    return <div className="nav nav-list">{hitComponents}</div>;
  }
);

export const SearchFacets = () => (
  <div>
    <h3>
      <i className="fa fa-fw fa-inbox fa-2x" />
      <span>Affiliations</span>
    </h3>
    <RefinementListLinks attribute="affiliations" />

    <h3>
      <i className="fa fa-fw fa-inbox fa-2x" />
      <span>Categories</span>
    </h3>
    <RefinementListLinks attribute="categories" />

    <h3 key="4">
      <i className="fa fa-fw fa-inbox fa-2x" />
      <span>Keywords</span>
    </h3>
    <RefinementListLinks attribute="keywords" />

    <ClearRefinements
      translations={{
        reset: 'Clear all filters',
      }}
    />
  </div>
);
