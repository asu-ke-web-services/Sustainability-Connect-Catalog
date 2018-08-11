import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {
  InstantSearch,
  Configure,
} from 'react-instantsearch-dom';
import classNames from 'classnames';
import { ScrollPanel } from 'primereact/components/scrollpanel/ScrollPanel';

import { AppTopbar } from './AppTopbar';
import { AppMenu } from './AppMenu';
import { SearchFacets } from './SearchFacets';
import { SearchResults } from './SearchResults';
import { withUrlSync } from './urlSync';

import 'primereact/resources/themes/omega/theme.css';
import 'primereact/resources/primereact.min.css';
import 'font-awesome/css/font-awesome.css';
import './App.css';
import './layout.css';
import './style.css';

class SearchApp extends Component {

    constructor() {
        super();
        this.state = {
            layoutMode: 'static',
            layoutColorMode: 'light',
            staticMenuInactive: false,
            overlayMenuActive: false,
            mobileMenuActive: false
        };

        this.onWrapperClick = this.onWrapperClick.bind(this);
        this.onToggleMenu = this.onToggleMenu.bind(this);
        this.onSidebarClick = this.onSidebarClick.bind(this);
        this.onMenuItemClick = this.onMenuItemClick.bind(this);
        this.createMenu();
    }

    onWrapperClick(event) {
        if (!this.menuClick) {
            this.setState({
                overlayMenuActive: false,
                mobileMenuActive: false,
            })
        }

        this.menuClick = false;
    }

    onToggleMenu(event) {
        this.menuClick = true;

        if (this.isDesktop()) {
            if (this.state.layoutMode === 'overlay') {
                this.setState({
                    overlayMenuActive: !this.state.overlayMenuActive
                });
            }
            else if (this.state.layoutMode === 'static') {
                this.setState({
                    staticMenuInactive: !this.state.staticMenuInactive
                });
            }
        }
        else {
            const mobileMenuActive = this.state.mobileMenuActive;
            this.setState({
                mobileMenuActive: !mobileMenuActive
            });

            if (mobileMenuActive)
                this.removeClass(document.body, 'body-overflow-hidden');
            else
                this.addClass(document.body, 'body-overflow-hidden');
        }

        event.preventDefault();
    }

    onSidebarClick(event) {
        this.menuClick = true;
        setTimeout(() => {this.layoutMenuScroller.moveBar(); }, 500);
    }

    onMenuItemClick(event) {
        if(!event.item.items) {
            this.setState({
                overlayMenuActive: false,
                mobileMenuActive: false
            })
        }
    }

    createMenu() {
        this.menu = [
            {
                label: 'Test Menu Modes', icon: 'fa fa-fw fa-cog',
                items: [
                    {label: 'Static Menu', icon: 'fa fa-fw fa-bars',  command: () => this.setState({layoutMode: 'static'}) },
                    {label: 'Overlay Menu', icon: 'fa fa-fw fa-bars',  command: () => this.setState({layoutMode: 'overlay'}) }
                ]
            }
        ];
    }

    addClass(element, className) {
        if (element.classList)
            element.classList.add(className);
        else
            element.className += ' ' + className;
    }

    removeClass(element, className) {
        if (element.classList)
            element.classList.remove(className);
        else
            element.className = element.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
    }

    isDesktop() {
        return window.innerWidth > 1024;
    }

    render() {
        let wrapperClass = classNames('layout-wrapper', {
            'layout-overlay': this.state.layoutMode === 'overlay',
            'layout-static': this.state.layoutMode === 'static',
            'layout-static-sidebar-inactive': this.state.staticMenuInactive && this.state.layoutMode === 'static',
            'layout-overlay-sidebar-active': this.state.overlayMenuActive && this.state.layoutMode === 'overlay',
            'layout-mobile-sidebar-active': this.state.mobileMenuActive
        });
        let sidebarClassName = classNames("layout-sidebar", {'layout-sidebar-dark': this.state.layoutColorMode === 'dark'});

        return (
          <InstantSearch
            appId="OISWB86UY6"
            apiKey="5b3f49bc4c117cce7b99c028562f51c0"
            indexName="opportunities"
            searchState={this.props.searchState}
            createURL={this.props.createURL}
            onSearchStateChange={this.props.onSearchStateChange}
          >
            <Configure hitsPerPage={10} />
            <div className={wrapperClass} onClick={this.onWrapperClick}>
                <AppTopbar onToggleMenu={this.onToggleMenu}/>

                <div ref={(el) => this.sidebar = el} className={sidebarClassName} onClick={this.onSidebarClick}>

                    <ScrollPanel ref={(el) => this.layoutMenuScroller = el} style={{height:'100%'}}>
                        <div className="layout-sidebar-scroll-content" >
                            <SearchFacets />
                            <AppMenu model={this.menu} onMenuItemClick={this.onMenuItemClick} />
                        </div>
                    </ScrollPanel>
                </div>

                <div className="layout-main">
                    <SearchResults />
                </div>

                <div className="layout-mask"></div>
            </div>
          </InstantSearch>
        );
    }
}

export default SearchApp = withUrlSync(SearchApp);
// Needed only if your js app doesn't do it already.
// Create-react-app does it for you
// ReactDOM.render(<SearchApp />, document.querySelector('#search'));
