### Important learning:

## % ancestor-child overriding

Specifying a % on a child element does not computationally compound with ancestors of that element
with % values (the ancestor has priority).

The ancestor will walk up the CSS tree until it finds a fixed value (px, vh, etc.) and will use that to compute its final value.

But the inverse priority order applies if the child has specified a specific value, then that is applied in priority over ancestors.

## Half screen widths using inline-block vs. flexbox

We can squeeze two elements on the same line and specify a custom width/height with inline-block dispaly, but if so, then elements need to be slightly less than 50vw, 49.83vw exactly. This still has the issue of slight gaps.

Using flexbox, this can be avoided because flexbox will automatically stretch elements to fill the whole line using elements of its flex container.

Using flexbox like that, elements will have a slight gap if the child image for example does not use display block.

## Thinking about which element should be the flex container 

If put a global container, then all children will be stacked horizontally or vertically.
Can issue a different custom container that is not flex, and children with flex containers that can be fitted in a grid.

# Grid-css

Use this to make grids over flexbox for ease.

## object-fit

A CSS property which allows video or img media to be resized in their container. "cover" will maintain aspect-ratio while filling the container completely, while contain ensures that the media will fit in but not necessarily fill the container (this is the default?).

## Event handling scope

When events are called, things will use the global scope variables if they are declared there. Should use variables in local scope to avoid this from happening.