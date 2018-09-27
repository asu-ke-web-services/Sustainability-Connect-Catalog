import React, { Component } from 'react';
import { Pagination, PoweredBy } from 'react-instantsearch-dom';

export class Footer extends Component {
  render() {
    return (
      <div>
        <nav aria-label="Navigate to other pages">
          <Pagination />
        </nav>
        <span>
          <PoweredBy />
        </span>
      </div>
    );
  }
}
