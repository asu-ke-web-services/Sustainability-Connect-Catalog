import React from 'react';
import {
  connectSearchBox,
} from 'react-instantsearch-dom';

export const SearchBox = connectSearchBox(({ currentRefinement, refine }) => (
  <span className="layout-topbar-search">
    <input
      type="text"
      value={currentRefinement}
      onChange={e => refine(e.target.value)}
      autoComplete="off"
      className="ui-inputtext ui-state-default ui-corner-all ui-widget"
      placeholder="Search"
    />
    <span className="layout-topbar-search-icon fa fa-search"/>
  </span>
));
