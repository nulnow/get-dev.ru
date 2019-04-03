import React, { Component } from 'react';
import { connect } from 'react-redux';

class App extends Component {
    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Example Component</div>
                            <p>{ this.props.counter }</p>
                            <div className="card-body">
                                I'm an example component!
                            </div>
                            <button onClick={this.props.onIncrement}>increment</button>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

function mapStateToProps(state) {
    return {
        counter: state.counter
    };
}

function mapDispatchToProps(dispatch) {
    return {
        onIncrement: () => dispatch({type: "INCREMENT"})
    };
}

export default connect(
    mapStateToProps,
    mapDispatchToProps
)(App);
