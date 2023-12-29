<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Email</title>
    <style>
        /* http://meyerweb.com/eric/tools/css/reset/
   v2.0 | 20110126
   License: none (public domain)
*/

        html,
        body,
        div,
        span,
        applet,
        object,
        iframe,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        blockquote,
        pre,
        a,
        abbr,
        acronym,
        address,
        big,
        cite,
        code,
        del,
        dfn,
        em,
        img,
        ins,
        kbd,
        q,
        s,
        samp,
        small,
        strike,
        strong,
        sub,
        sup,
        tt,
        var,
        b,
        u,
        i,
        center,
        dl,
        dt,
        dd,
        ol,
        ul,
        li,
        fieldset,
        form,
        label,
        legend,
        table,
        caption,
        tbody,
        tfoot,
        thead,
        tr,
        th,
        td,
        article,
        aside,
        canvas,
        details,
        embed,
        figure,
        figcaption,
        footer,
        header,
        hgroup,
        menu,
        nav,
        output,
        ruby,
        section,
        summary,
        time,
        mark,
        audio,
        video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 16px;
            font: inherit;
            vertical-align: baseline;
        }

        /* HTML5 display-role reset for older browsers */
        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        menu,
        nav,
        section {
            display: block;
        }

        body {
            line-height: 1;
        }

        ol,
        ul {
            list-style: none;
        }

        blockquote,
        q {
            quotes: none;
        }

        blockquote:before,
        blockquote:after,
        q:before,
        q:after {
            content: '';
            content: none;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        body {
            font-family: system-ui;
        }

        #wrapper {
            font-family: system-ui;
            margin: 0px auto;
            max-width: 500px;
            padding: 0.5rem;
        }

        .header {
            display: flex;
            background: #265f8d;
            color: whitesmoke;
            width: 100%;
            height: 65px;
        }

        .header img {
            width: 65px;
            height: 65px;
        }

        .header h1 {
            font-size: 2.7rem;
            font-weight: bold;
            padding-left: .5rem;
        }

        .content {
            background-color: #f9f7f7;
            min-height: 280px;
            padding: 1rem;
        }

        .content p {
            margin-top: .4rem;
            font-size: 1.2rem;
            color: #565656;
        }
        .content .p-first {
            font-size: 1.5rem;
            color: #265f8d;
        }

        .content__actions {
            display: flex;
            width: 200px;
            margin: 3rem auto;
        }

        .content__actions a {
            width: 100%;
            padding: 0.8rem;
            border-radius: 11px;
            font-size: 1.1rem;
            border: none;
            background: #265f8d;
            color: whitesmoke;
            cursor: pointer;
            text-decoration: none;
        }

        footer{
            background-color: #f9f7f7;
            max-width: 500px;
            text-align: center;
            padding: 1rem;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div class="header">
            <img src="{{ $logo }}" height="65px" width="65px"
                alt="logo studio ghibli" />
            <h1>Studio Ghibli</h1>
        </div>
        <div class="content">
            <p class="p-first">Hi, {{$name}}</p>
            <p>Welcome to this great community!!!</p>
            <div class="content__actions">
                <a target="_blank"  href="{{$verification_url}}">ACTIVATE ACCOUNT</a>
            </div>
        </div>
        <footer>
            <h6>Welcome❤️</h6>
        </footer>
    </div>
</body>

</html>
