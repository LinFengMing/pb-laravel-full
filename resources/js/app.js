import React from 'react';
import ReactDom from 'react-dom';
import Home from './home.jsx';
import Page1 from './page1.jsx';
import { initAddToCart, initCartDeleteButton } from './cart.js';

window.render = {
    home: (containerTag, title) => {
        ReactDom.render(
            <Home title={title} />,
            containerTag
        )
    },
    page1: (containerTag) => {
        ReactDom.render(
            <Page1 />,
            containerTag
        )
    }
};

window.initAddToCart = initAddToCart;
window.initCartDeleteButton = initCartDeleteButton;
