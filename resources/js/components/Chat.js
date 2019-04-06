import React, {Component, Fragment} from 'react';

export default class Chat extends Component {
    constructor(props) {
        super(props);

    this.state = {
        input: '',
        messages: []
    };

        setInterval(() => {
            reloadMessages();
        }, 2000);

        this.onInputChange = this.onInputChange.bind(this);
        this.onMessageSend = this.onMessageSend.bind(this);
        this.reloadMessages = this.reloadMessages.bind(this);
    }

    componentDidMount() {
        this.reloadMessages();
    }

    reloadMessages() {
        axios.get(`/users/${window.notYou.id}/messages`)
            .then(response => response.data)
            .then(messages => this.setState({messages}));
    }

    onInputChange(event) {
        if (event.target.value.length >= 255) {
            return;
        }

        this.setState({input: event.target.value});
    }

    onMessageSend(event) {
        event.preventDefault();

        if (!this.state.input) {
            return;
        }

        axios.get(`/users/${window.notYou.id}/sendMessage?text=${encodeURI(this.state.input)}`)
            .then(response => response.data)
            .then(message => this.setState(state => ({messages: [...state.messages, message]})));

        this.setState({input:''});
    }


    render() {
        return (
            <Fragment>
                <header className={"chat__header"}>
                    <div className={"chat__not-you"}>{ window.notYou.name }</div>
                    <div className={"chat__you"}>{ window.you.name }</div>
                </header>
                <main className={"chat__main"}>
                    <div className="chat__messages">
                        {
                            this.state.messages.map(message => {
                                return(
                                    <div key={message.id} className={message.from === window.you.id ? 'right' : 'left'}>
                                        <div className={`message`}>
                                            {message.text}
                                        </div>
                                    </div>
                                )
                            })
                        }
                    </div>
                    <div className="chat__input">
                        <form onSubmit={this.onMessageSend}>
                            <input value={this.state.input} onChange={this.onInputChange} />
                        </form>
                    </div>
                </main>
            </Fragment>
        );
    }

}
