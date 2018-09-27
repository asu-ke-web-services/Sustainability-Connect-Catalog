import React, {Component} from 'react';
import { Table } from 'react-bootstrap';
import { Hits } from './Hits';

export class Results extends Component {

  getTable() {
    let jsx;

    if (this.props.indexName === 'internships') {
      jsx = (
        <Table striped bordered responsive>
          <thead>
          <tr>
            <th className="col col-md-4">Name</th>
            <th className="col col-md-4">Organization</th>
            <th className="col col-md-3">Availability</th>
            <th className="col col-md-1 text-center">Apply By</th>
          </tr>
          </thead>
          <Hits indexName={this.props.indexName} />
        </Table>
      );
    } else {
      jsx = (
        <Table striped bordered responsive>
          <thead>
          <tr>
            <th className="col col-md-4">Name</th>
            <th className="col col-md-2">Availability</th>
            <th className="col col-md-1">City</th>
            <th className="col col-md-2 text-center">Begins</th>
            <th className="col col-md-2 text-center">Ends</th>
            <th className="col col-md-1 text-center">Apply By</th>
          </tr>
          </thead>
          <Hits indexName={this.props.indexName} />
        </Table>
      );
    }

    return jsx;
  }

  render() {
    return <div>{this.getTable()}</div>;
  }
}
