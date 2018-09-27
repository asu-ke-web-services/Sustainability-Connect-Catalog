import React, { Component } from 'react';
import { Stats } from 'react-instantsearch-dom';
import { SearchBox } from './SearchBox';
import { Col, Row } from 'react-bootstrap';

export class Header extends Component {
  render() {
    return (
      <Row>
        <Col sm={8} />
        <Col sm={4}>
          <SearchBox />
          <div className="text-muted">
            <Stats />
          </div>
        </Col>
      </Row>
    );
  }
}
