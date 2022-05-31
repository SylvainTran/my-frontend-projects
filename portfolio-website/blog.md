### Important learning:

## Stateful React components, props and stateless functions

It took me quite a while to see (before I used the React Debugger) that initializing a React component's state to its parent's props only gets called at the construction.
You need a different notification mechanism for it to consider its parent's state.
But importantly, that component may benefit in being only a stateless function that uses props to update its data - no need to make it a stateful component, which is what I ended up doing.
