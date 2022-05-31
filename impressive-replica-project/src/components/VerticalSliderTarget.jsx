import React from 'react';
import '../css/style.css';

class VerticalSliderTarget extends React.Component {

  constructor(props) {
    super(props);
  }

  render() {
    return (
      <div className="vertical-slide-target">
        <video autoPlay loop={true} src={this.props.src} />
      </div>);
  }
}

export default VerticalSliderTarget;
