import React, {Component} from 'react';
import {connect} from 'react-redux';

class App extends Component {

    constructor(props) {
        super(props);

        fetch('/eee', {});
        this.onLoadClick = this.onLoadClick.bind(this);
    }

    onLoadClick() {
        if (this.props.loading) return;
        this.props.onLoadStart();
        fetch('/delay')
            .then(() => {
                this.props.onLoadEnd()
            })
            .catch(() => {
                this.props.onLoadEnd()
            });
    };

    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Example Component</div>
                            <p>{this.props.counter}</p>
                            <div className="card-body">
                                {this.props.loading ? 'loading' : 'loading complete!'}
                            </div>
                            <button onClick={this.props.onIncrement}>increment</button>
                            <button onClick={this.onLoadClick}>load</button>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

function mapStateToProps(state) {
    return {
        counter: state.counter,
        loading: state.loading
    };
}

function mapDispatchToProps(dispatch) {
    return {
        onIncrement: () => dispatch({type: 'INCREMENT'}),
        onLoadStart: () => dispatch({type: 'START_LOADING'}),
        onLoadEnd: () => dispatch({type: 'END_LOADING'})
    };
}

export default connect(
    mapStateToProps,
    mapDispatchToProps
)(App);
