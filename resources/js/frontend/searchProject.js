import React from 'react';
import ReactDOM from 'react-dom';
import SearchApp from './components/SearchApp';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

// require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

if (document.getElementById('search')) {
    ReactDOM.render(
      <SearchApp
        indexName="projects"
        viewActive={true}
        userAccessAffiliations={JSON.parse(algolia.userAccessAffiliations)}
        canViewRestricted={algolia.canViewRestricted}
      />, document.querySelector('#search')
    );
}
