import React from 'react';

// Css
import '../css/main.css';
import '../css/style.css';
import '../css/flickity.min.css';

// Libs
import Flickity from 'flickity';

// Components
import IdentityCarouselCell from './IdentityCarouselCell.jsx';
import PortfolioGrid from './PortfolioGrid.jsx';
import CarouselCell from './CarouselCell.jsx';

class MainCarousel extends React.Component {

  constructor(props) {
    super(props);
  }

  render() {
    return (
      <div className="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
        <IdentityCarouselCell id="a1-1"/>
        <PortfolioGrid id="a2-1"/>
        <CarouselCell id="a3-1"/>
      </div>);
  }
}

export default MainCarousel;
