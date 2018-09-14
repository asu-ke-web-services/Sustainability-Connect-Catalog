import React from 'react';
import {
  connectHits,
  Highlight,
  Hits,
  Stats,
  Pagination,
} from 'react-instantsearch-dom';

export const SearchResults = () => (
  <article>
    <div id="stats" className="text-right text-muted">
      <Stats />
    </div>
    <hr />
    <div id="hits">
      <div className="container-fluid table-responsive">
        <div className="divTable">
          <div className="divTableHeading">
            <div className="divTableRow">
              <div className="divTableHead">Name</div>
              <div className="divTableHead">Availability</div>
              <div className="divTableHead">City</div>
              {/*<div className="divTableHead">Current Status <i className="fa fa-question-circle-o"></i></div>*/}
              <div className="divTableHead">Begins</div>
              <div className="divTableHead">Ends</div>
              <div className="divTableHead">Apply By</div>
            </div>
          </div>
          <div className="divTableBody">
            <Hits hitComponent={Hit} />
          </div>
        </div>
      </div>
    </div>
    <div id="pagination" className="text-center">
      <Pagination />
      <span><img src="images/search-by-algolia-light-background-8762ce8b.svg" alt="Search by Algolia" height=""></img></span>
    </div>
  </article>
);

const Hit = hit => {
  const { id, name, publicName, description, applicationDeadline, startDate, endDate, locations, organizationName } = hit.hit;
  return (
    <div className="divTableRow">
      <div className="divTableCell">
        <a href={"/projects/" + id}>
          <Highlight attribute="name" hit={hit.hit} />
        </a>
      </div>
      <div className="divTableCell">
        <span className="fa-stack" title="" data-toggle="tooltip" data-container="body" data-original-title="Available for Graduate Students"> <strong className="fa-stack-1x fa-inverse">G</strong> </span>
      </div>
      <div className="divTableCell">{locations}</div>
      {/*<!--<div className="divTableCell"></div>-->*/}
      <div className="divTableCell">applicationDeadline</div>
      <div className="divTableCell">startDate</div>
      <div className="divTableCell">endDate</div>
    </div>
  );
};
