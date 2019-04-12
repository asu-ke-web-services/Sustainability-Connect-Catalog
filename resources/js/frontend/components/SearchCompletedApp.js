import React, { Component } from 'react';
import { connectMenu, InstantSearch, Configure } from 'react-instantsearch-dom';
import { SearchPage } from './SearchPage';
import { withUrlSync } from './urlSync';
import '../../../sass/frontend/asu/SearchApp.css';
import 'font-awesome/css/font-awesome.min.css';

const VirtualMenu = connectMenu(() => null);
const Active = () => <VirtualMenu attribute="active" defaultRefinement="false" />;

class SearchCompletedApp extends Component {
  render() {
    return (
      <InstantSearch
        appId="OISWB86UY6"
        apiKey="5b3f49bc4c117cce7b99c028562f51c0"
        indexName={this.props.indexName}
        viewActive={this.props.viewActive}
        searchState={this.props.searchState}
        createURL={this.props.createURL}
        onSearchStateChange={this.props.onSearchStateChange}
      >
        <Configure hitsPerPage={20} />
        <Active />
        <SearchPage indexName={this.props.indexName}
          userAccessAffiliations={this.props.userAccessAffiliations}
          canViewRestricted={this.props.canViewRestricted} />
      </InstantSearch>
    );
  }
}

export default withUrlSync(SearchCompletedApp);
