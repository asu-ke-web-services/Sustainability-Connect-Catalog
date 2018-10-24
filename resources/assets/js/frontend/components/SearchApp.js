import React, { Component } from 'react';
import { InstantSearch, Configure } from 'react-instantsearch-dom';
import { SearchPage } from './SearchPage';
import { withUrlSync } from './urlSync';
import '../../../sass/frontend/SearchApp.css';
import 'font-awesome/css/font-awesome.min.css';

class SearchApp extends Component {
  render() {
    return (
      <InstantSearch
        appId="OISWB86UY6"
        apiKey="5b3f49bc4c117cce7b99c028562f51c0"
        indexName={this.props.indexName}
        searchState={this.props.searchState}
        createURL={this.props.createURL}
        onSearchStateChange={this.props.onSearchStateChange}
      >
        <Configure hitsPerPage={20} />
        <SearchPage indexName={this.props.indexName}
                    accessAffiliations={this.props.accessAffiliations}
                    canViewRestricted={this.props.canViewRestricted} />
      </InstantSearch>
    );
  }
}

export default withUrlSync(SearchApp);
