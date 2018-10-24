import React, { Component } from 'react';
import { Stats } from 'react-instantsearch-dom';
import { SearchBox } from './SearchBox';
import { Col, Row } from 'react-bootstrap';

export class Header extends Component {
  render() {
    return (
      <Row>
        <Col sm={12} />
        <Col sm={7} xs={10}>
          <SearchBox />
          <div className="text-muted">
            <Stats />
          </div>
        </Col>
      </Row>
    );
  }
}
