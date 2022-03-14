function strlimit(string, from, to, suffix = "...") {
    if (string.length > to) {
        string = string.substr(from, to) + suffix;
    }

    return string;
}
