import React, { Component } from 'react';
import BurgerMenu from 'react-burger-menu';
import { SearchFacets } from './SearchFacets';
import { InternshipSortBy } from './InternshipSortBy';
import { ProjectSortBy } from './ProjectSortBy';

class MenuWrap extends Component {
  constructor(props) {
    super(props);
    this.state = {
      hidden: false,
    };
  }

  show() {
    this.setState({ hidden: false });
  }

  render() {
    let style;

    if (this.state.hidden) {
      style = { display: 'none' };
    }

    return (
      <div style={style} className={this.props.side}>
        {this.props.children}
      </div>
    );
  }
}

export class Sidebar extends Component {
  constructor(props) {
    super(props);
    this.state = {
      currentMenu: 'slide',
      side: 'right',
    };
  }

  getMenu() {
    const Menu = BurgerMenu[this.state.currentMenu];
    let jsx;

    if (this.props.indexName === 'internships') {
      jsx = (
        <MenuWrap wait={20} side={this.state.side}>
          <Menu
            id={this.state.currentMenu}
            pageWrapId={'page-wrap'}
            outerContainerId={'outer-container'}
            right
            noOverlay
            customBurgerIcon={ <img src="/img/frontend/search.svg" /> }
          >
            <div className="sort-by">
              <h3>Sort by</h3>
              <InternshipSortBy />
            </div>
            <SearchFacets indexName={this.props.indexName} />
          </Menu>
        </MenuWrap>
      );
    } else {
      jsx = (
        <MenuWrap wait={20} side={this.state.side}>
          <Menu
            id={this.state.currentMenu}
            pageWrapId={'page-wrap'}
            outerContainerId={'outer-container'}
            right
            noOverlay
            customBurgerIcon={ <img src="/img/frontend/search.svg" /> }
          >
            <div className="sort-by">
              <h3>Sort by</h3>
              <ProjectSortBy />
            </div>
            <SearchFacets indexName={this.props.indexName} />
          </Menu>
        </MenuWrap>
      );
    }

    return jsx;
  }

  render() {
    return <div>{this.getMenu()}</div>;
  }
}
