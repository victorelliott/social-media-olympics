// Pass boolean by reference for spam prevention.
function NoClick()
{
    this.noclick = false;
}

function parseCount(countStr)
{
    return parseInt(countStr.replace(/,/g, ""));
}

function delimit(count)
{
    return count.toLocaleString();
}

function getNumInRange(min, max)
{
    return Math.floor(Math.random() * (max - min + 1) + min);
}
