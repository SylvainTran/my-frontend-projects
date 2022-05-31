import React from 'react';
import '../css/main.css';
import '../css/style.css';

// Components
import IdentityElement from './IdentityElement.jsx';
import VerticalSliderTarget from './VerticalSliderTarget.jsx';

class IdentityCarouselCell extends React.Component {

  constructor(props) {
    super(props);
  }

  render() {
    return (
      <section id={this.props.id} className="carousel-cell">
        <VerticalSliderTarget />
        <section className="main-unit identity-section my-is-flex is-centered">
          <div className="text-middle-container is-absolute">
            <IdentityElement id="identity-section-el-1" text="Adventurers"/>
            <IdentityElement id="identity-section-el-2" text="Helpers"/>
            <IdentityElement id="identity-section-el-3" text="Storytellers"/>
          </div>
          <video autoPlay loop={true} src="../../assets/astronaut.mp4" />
        </section>
      </section>);
  }
}

export default IdentityCarouselCell;
