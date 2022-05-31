import React from 'react';
import logo from './logo.svg';

// CSS
import './App.css';

// Components
import MainCarousel from './components/MainCarousel.jsx';

function App() {
  return (
    <div className="App">
      <section>
        <MainCarousel />
      </section>
    </div>
  );
}

export default App;
