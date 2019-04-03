
require('./bootstrap');



import App from './components/Example';
import React from 'react';
import ReactDOM from 'react-dom';
import {createStore} from 'redux';
import {Provider} from 'react-redux';

if (document.getElementById('app')) {
    const store = createStore((store = {counter: 0}, action) => {

        if (action.type === 'INCREMENT') {
            return {...store, counter: store.counter + 1}
        }

        return {counter: 0};
    });

    ReactDOM.render(<Provider store={store}><App /></Provider>, document.getElementById('app'));
}
