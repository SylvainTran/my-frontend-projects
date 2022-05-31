import React from 'react';
import '../css/style.css';

//<div id="identity-section-el-1" class="identity-el">ADVENTURERS</div>
function IdentityElement(props) {
  return (<div id={props.id} className="identity-el">{props.text}</div>);
}

export default IdentityElement;
