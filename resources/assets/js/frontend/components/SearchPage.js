import React, { Component } from 'react';
import { Col, Grid, Row } from 'react-bootstrap';
import { Footer } from './Footer';
import { Header } from './Header';
import { Results } from './Results';
import { Sidebar } from './Sidebar';

export class SearchPage extends Component {
  render() {
    return (
      <div id="outer-container">
        <Sidebar indexName={this.props.indexName} />
        <Grid id="page-wrap" >
          <Header />
          <hr />
          <Row>
            <Col sm={12}>
              <Results indexName={this.props.indexName}
                       userAccessAffiliations={this.props.userAccessAffiliations}
                       canViewRestricted={this.props.canViewRestricted} />
            </Col>
          </Row>
          <Row>
            <Col sm={12}>
              <Footer />
            </Col>
          </Row>
        </Grid>
      </div>
    );
  }
}
