
require('./bootstrap');

import App from './components/Example';
import Chat from './components/Chat';
import React from 'react';
import ReactDOM from 'react-dom';
import {createStore} from 'redux';
import {Provider} from 'react-redux';

if (document.getElementById('app')) {
    const initialStore = {counter: 0};
    const store = createStore((store = initialStore, action) => {

        if (action.type === 'INCREMENT') {
            return {...store, counter: store.counter + 1}
        }

        if (action.type === 'START_LOADING') {
            return {...store, loading: true}
        }

        if (action.type === 'END_LOADING') {
            return {...store, loading: false}
        }

        return {counter: 0};
    });

    ReactDOM.render(<Provider store={store}><App /></Provider>, document.getElementById('app'));
}

if (document.getElementById('chat')) {
    ReactDOM.render(<Chat />, document.getElementById('chat'));
}
