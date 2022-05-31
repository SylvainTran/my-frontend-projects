import React from 'react';
import '../css/main.css';
import '../css/style.css';

// Components
import IdentityElement from './IdentityElement.jsx';
import VerticalSliderTarget from './VerticalSliderTarget.jsx';

class PortfolioGrid extends React.Component {

  constructor(props) {
    super(props);
  }

  render() {
    return (
      <section id={this.props.id} className="carousel-cell">
        <VerticalSliderTarget />
        <div className="grid-container main-unit">
          <button className="vertical-slide-trigger round-button">Slide up</button>
          <div className="grid-item">
            <video autoPlay loop={true} src="../../assets/ruins.mp4" />
          </div>
          <div className="grid-item">
            <video autoPlay loop={true} src="../../assets/camping.mp4" />
          </div>
          <div className="grid-item">
            <video autoPlay loop={true} src="../../assets/satellite.mp4" />
          </div>
          <div className="grid-item">
            <video autoPlay loop={true} src="../../assets/ukraine.mp4" />
          </div>
        </div>
      </section>);
  }
}

export default PortfolioGrid;
