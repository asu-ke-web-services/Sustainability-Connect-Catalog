import React, { Component } from 'react';
import { SortBy } from 'react-instantsearch-dom';

export class ProjectSortBy extends Component {
  render() {
    return (
      <SortBy
        items={[
          { value: 'projects', label: 'Apply By asc.' },
          { value: 'projects_application_deadline_at_desc', label: 'Apply By desc.' },
          { value: 'projects_opportunity_start_at_asc', label: 'Project Begins asc.' },
          { value: 'projects_opportunity_start_at_desc', label: 'Project Begins desc.' },
          { value: 'projects_opportunity_end_at_asc', label: 'Project Ends asc.' },
          { value: 'projects_opportunity_end_at_desc', label: 'Project Ends desc.' },
        ]}
        defaultRefinement="projects"
      />
    );
  }
}
