import ReactDOM from 'react-dom';
import React, { useState } from 'react';

function Example() {
    const [dados, setDados] = useState(0);

    return (
        <div className='container'>
            <h1> teste </h1>
        </div>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
