import React from 'react';
import {
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
      <Hits hitComponent={Hit} />
    </div>
    <div id="pagination" className="text-center">
      <Pagination />
      <span><img src="images/search-by-algolia-light-background-8762ce8b.svg" alt="Search by Algolia" height=""></img></span>
    </div>
  </article>
);

const Hit = hit => {
  const { name, public_name, description, application_deadline, start_date, end_date, addresses, organization_name } = hit.hit;
  return (
    <div className="container-fluid">
      <div id="pf-list-var3" className="list-group list-view-pf">
        <div className="list-group-item list-view-pf-stacked list-view-pf-top-align">
          <div className="list-view-pf-main-info">
            <div className="list-view-pf-body">
          <div className="list-view-pf-description">
            <div className="list-group-item-heading">
              <a href={"/projects/" + hit.hit.id}>
                <Highlight attribute="name" hit={hit.hit} />
              </a>
            </div>
            <div className="list-group-item-text">
              <Highlight attribute="description" hit={hit.hit} />
            </div>
          </div>
          <div className="list-view-pf-additional-info">
            <div className="list-view-pf-additional-info-item list-view-pf-additional-info-item-stacked">
              <span className="fa-stack" data-toggle="tooltip" data-container="body" title="" data-original-title="Restricted to students majoring in degrees from The School of Sustainability">
                <span className="fa fa-square fa-green fa-stack-2x"></span>
                <span className="fa fa-leaf fa-stack-1x"></span>
              </span>
            </div>
            <div className="list-view-pf-additional-info-item list-view-pf-additional-info-item-stacked">
              Location
            </div>
            <div className="list-view-pf-additional-info-item list-view-pf-additional-info-item-stacked">
              {application_deadline}
            </div>
            <div className="list-view-pf-additional-info-item list-view-pf-additional-info-item-stacked">
              {start_date}
            </div>
            <div className="list-view-pf-additional-info-item list-view-pf-additional-info-item-stacked">
              {end_date}
            </div>
          </div>
        </div>
          </div>
        </div>
      </div>
    </div>
  );
};
