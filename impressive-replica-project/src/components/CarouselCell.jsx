import React from 'react';
import '../css/main.css';
import '../css/style.css';

// Components
import IdentityElement from './IdentityElement.jsx';
import VerticalSliderTarget from './VerticalSliderTarget.jsx';

class CarouselCell extends React.Component {

  constructor(props) {
    super(props);
  }

  render() {
    return (
      <section id={this.props.id} className="carousel-cell">
        <VerticalSliderTarget />
        <section className="main-unit identity-section my-is-flex is-centered">
          <h1>Cell</h1>
        </section>
      </section>);
  }
}

export default CarouselCell;
