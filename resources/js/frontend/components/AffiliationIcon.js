import React from 'react';
import PropTypes from 'prop-types';

function Icon(props) {
  if (props.faIcon !== null) {
    return props.faIcon.map(layer => (
      <div key={layer.className} className={layer.className}>
        {layer.content}
      </div>
    ));
  }

  return <div />;
}

Icon.propTypes = {
  faIcon: PropTypes.array,
};

export const AffiliationIcon = ({ faIcon }) => (
  <div>
    <Icon faIcon={faIcon} />
  </div>
);

AffiliationIcon.propTypes = {
  faIcon: PropTypes.array,
};
