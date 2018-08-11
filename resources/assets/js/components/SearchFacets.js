import React from 'react';
import {
  ClearRefinements,
  connectRefinementList,
} from 'react-instantsearch-dom';

export const SearchFacets = () => (
  <aside>
    <Panel title="Types" id="type">
      <RefinementListLinks attribute="type" defaultRefinement="Project"/>
    </Panel>
    <Panel title="Categories" id="categories">
      <RefinementListLinks attribute="categories" />
    </Panel>
    <Panel title="Keywords" id="keywords">
      <RefinementListLinks attribute="keywords" />
    </Panel>
    <ClearRefinements
      translations={{
        reset: 'Clear all filters',
      }}
    />
  </aside>
);

const Panel = ({ title, children, id }) => (
  <div id={id}>
    <h5>
      <i className="fa fa-chevron-right" /> {title}
    </h5>
    {children}
  </div>
);

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
