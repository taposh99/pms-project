import React from 'react';
import ReactDOM from 'react-dom/client';

function Main() {
    return (
        <div className="test">
            <h1>Hello</h1>
        </div>
    );
}

export default Main;

if (document.getElementById('root')) {
    const Index = ReactDOM.createRoot(document.getElementById("root"));

    Index.render(
        <React.StrictMode>
            <Main/>
        </React.StrictMode>
    )
}
