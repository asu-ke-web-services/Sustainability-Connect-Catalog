import React, { Component } from 'react';
import { SortBy } from 'react-instantsearch-dom';

export class InternshipSortBy extends Component {
  render() {
    return (
      <SortBy
        items={[
          { value: 'internships', label: 'Apply By asc.' },
          { value: 'internships_by_application_deadline_desc', label: 'Apply By desc.' }
        ]}
        defaultRefinement="internships"
      />
    );
  }
}
