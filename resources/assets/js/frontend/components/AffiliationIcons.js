import React from 'react';
import { OverlayTrigger, Tooltip } from 'react-bootstrap';
import { AffiliationIcon } from './AffiliationIcon';
import PropTypes from 'prop-types';

function tooltipText(tipText) {
  return <Tooltip id="tooltip">{tipText}</Tooltip>;
}

export const AffiliationIcons = ({ icons }) => (
  <span>
    {icons.map(icon => (
      <OverlayTrigger
        key={icon.slug}
        placement="top"
        overlay={tooltipText(icon.help_text)}
      >
        <span className="fa-stack">
          <AffiliationIcon faIcon={icon.frontend_fa_icon} />
        </span>
      </OverlayTrigger>
    ))}
  </span>
);

AffiliationIcons.propTypes = {
  icons: PropTypes.array,
};
