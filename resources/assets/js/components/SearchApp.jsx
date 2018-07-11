import React from 'react';
import ReactDOM from 'react-dom';
import {
  InstantSearch,
  SearchBox,
  Hits,
  Highlight,
  Stats,
  SortBy,
  Pagination,
  RefinementList,
  Menu
} from 'react-instantsearch-dom';

const Sidebar = () => (
    <div className="left-column">
        <h5>Category</h5>
        <RefinementList attribute="categories"/>
        <h5>Keywords</h5>
        <RefinementList attribute="keywords" withSearchBox/>
    </div>
);

const Content = () => (
    <div>
        <div>
            <Stats/>
            <SortBy
                defaultRefinement="projects"
                items={[
                    {value:'projects', label:'Most Relevant'},
                    {value:'projects_title_asc', label:'Title Asc'},
                    {value:'projects_title_desc', label:'Title Desc'}
                ]}
            />
        </div>
        <Hits hitComponent={Hit}/>
        <div className="pagination">
            <Pagination showLast/>
        </div>
    </div>
);

const Hit = ({hit}) => (
<tr>
    <td data-title="Name"><a href="/projects/">{ hit.title }</a></td>
    <td class="icon-column" data-title="Availability"><span class="fa-stack" data-toggle="tooltip" data-container="body" title="" data-original-title="Restricted to students majoring in degrees from The School of Sustainability">
            <i class="fa fa-square fa-green fa-stack-2x"></i>
            <i class="fa fa-leaf fa-stack-1x"></i>
        </span>
        <span class="fa-stack" data-toggle="tooltip" data-container="body" title="" data-original-title="Can fulfill School of Sustainability Culminating Experience">
            <i class="fa fa-square fa-gold fa-stack-2x"></i>
            <i class="fa fa-graduation-cap fa-stack-1x"></i>
        </span>
        <span class="fa-stack" data-toggle="tooltip" data-container="body" title="" data-original-title="Available for Undergraduate Students">
            <i class="fa fa-square fa-blue fa-stack-2x"></i>
            <strong class="fa-stack-1x fa-inverse">U</strong>
        </span>
        <span class="fa-stack" data-toggle="tooltip" data-container="body" title="" data-original-title="Available for Graduate Students">
            <i class="fa fa-square fa-blue-darkened fa-stack-2x"></i>
            <strong class="fa-stack-1x fa-inverse">G</strong>
        </span></td>
    <td data-title="City">{ hits.addresses }</td>
    <td data-title="Begins">{ hits.start_date }</td>
    <td data-title="Ends">{ hits.end_date }</td>
    <td data-title="Apply By">{ hits.application_deadline }</td>
</tr>
);

const SearchApp = () => (
    <InstantSearch
        appId="OISWB86UY6"
        apiKey="5b3f49bc4c117cce7b99c028562f51c0"
        indexName="projects"
    >
        <Content/>
    </InstantSearch>
);

// Needed only if your js app doesn't do it already.
// Create-react-app does it for you
ReactDOM.render(<SearchApp />, document.querySelector('#search'));
