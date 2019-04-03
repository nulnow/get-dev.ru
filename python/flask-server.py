from flask import Flask, request, json, jsonify
app = Flask(__name__)

@app.route('/echo', methods=[ 'POST'])
def echo():
    json_data = request.get_json()
    text = json_data.get('text', None)
    if (text):
        return 'You send ' + str(text)
    else:
        return 'No text sended'

@app.route('/welcome', methods=[ 'GET'])
def welcome():
    return 'hello form python'

if __name__ == '__main__':
    app.run(host="0.0.0.0", port=5000)
