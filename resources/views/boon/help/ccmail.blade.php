@extends('layouts.help')

@section('title', '분쟁제로닷컴')


@section('content')


<head>
    <meta charset="UTF-8">
    <title>

        Hello World &middot; GitHub Guides

    </title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="stylesheet" href="/site/help/ccmail/gridism.css">
    <link rel="stylesheet" href="/site/help/ccmail/markdown.css">
    <link rel="stylesheet" href="/site/help/ccmail/octicons.css">
    <link href="/site/help/ccmail/main.css" rel="stylesheet" />
    <link href="/site/help/ccmail/pygments.css" rel="stylesheet" />

    <script src="/site/help/ccmail/jquery.js" type="text/javascript"></script>
    <script src="/site/help/ccmail/snap.svg-min.js" type="text/javascript"></script>
    <script src="/site/help/ccmail/application.js" type="text/javascript"></script>

    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-3769691-29']);
        _gaq.push(['_trackPageview']);
        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>

</head>
<body>

<header>
    <div class="wrap">
        <ul class="links">
            <li><a href="https://www.youtube.com/githubguides">Video Guides</a></li>
            <li><a href="https://help.github.com">GitHub Help</a></li>
            <li class="nav-github"><a href="https://github.com">GitHub.com</a></li>
            <li class="nav-rss"><a href="/feed/index.xml"><span class="octicon octicon-rss"></span></a></li>
        </ul>

        <a href ="/"><img src="/images/logo@2x.png" width="136" height="25" alt ="GitHub Guides logo"/></a>
    </div>
</header>

<article class="full">
    <div class="article-heading js-article-heading js-geopattern" style="background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0NDAiIGhlaWdodD0iNDQwIj48cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJyZ2IoMTI3LCA1NCwgNjApIiAgLz48cmVjdCB4PSIwIiB5PSI1IiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxNSIgb3BhY2l0eT0iMC4xMDY2NjY2NjY2NjY2NjY2NyIgZmlsbD0iI2RkZCIgIC8+PHJlY3QgeD0iMCIgeT0iMjkiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjE4IiBvcGFjaXR5PSIwLjEzMjY2NjY2NjY2NjY2NjY1IiBmaWxsPSIjMjIyIiAgLz48cmVjdCB4PSIwIiB5PSI1NyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAiIG9wYWNpdHk9IjAuMDYzMzMzMzMzMzMzMzMzMzQiIGZpbGw9IiMyMjIiICAvPjxyZWN0IHg9IjAiIHk9IjgyIiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMyIgb3BhY2l0eT0iMC4wODkzMzMzMzMzMzMzMzMzMyIgZmlsbD0iI2RkZCIgIC8+PHJlY3QgeD0iMCIgeT0iMTEzIiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMiIgb3BhY2l0eT0iMC4wODA2NjY2NjY2NjY2NjY2NiIgZmlsbD0iIzIyMiIgIC8+PHJlY3QgeD0iMCIgeT0iMTM3IiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMyIgb3BhY2l0eT0iMC4wODkzMzMzMzMzMzMzMzMzMyIgZmlsbD0iI2RkZCIgIC8+PHJlY3QgeD0iMCIgeT0iMTY5IiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMCIgb3BhY2l0eT0iMC4wNjMzMzMzMzMzMzMzMzMzNCIgZmlsbD0iIzIyMiIgIC8+PHJlY3QgeD0iMCIgeT0iMTg0IiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSI3IiBvcGFjaXR5PSIwLjAzNzMzMzMzMzMzMzMzMzMzIiBmaWxsPSIjZGRkIiAgLz48cmVjdCB4PSIwIiB5PSIxOTgiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjIwIiBvcGFjaXR5PSIwLjE1IiBmaWxsPSIjMjIyIiAgLz48cmVjdCB4PSIwIiB5PSIyMzMiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjE2IiBvcGFjaXR5PSIwLjExNTMzMzMzMzMzMzMzMzM0IiBmaWxsPSIjMjIyIiAgLz48cmVjdCB4PSIwIiB5PSIyNjEiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjUiIG9wYWNpdHk9IjAuMDIiIGZpbGw9IiNkZGQiICAvPjxyZWN0IHg9IjAiIHk9IjI3MiIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTQiIG9wYWNpdHk9IjAuMDk4IiBmaWxsPSIjMjIyIiAgLz48cmVjdCB4PSIwIiB5PSIyOTgiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEyIiBvcGFjaXR5PSIwLjA4MDY2NjY2NjY2NjY2NjY2IiBmaWxsPSIjMjIyIiAgLz48cmVjdCB4PSIwIiB5PSIzMjciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwIiBvcGFjaXR5PSIwLjA2MzMzMzMzMzMzMzMzMzM0IiBmaWxsPSIjMjIyIiAgLz48cmVjdCB4PSIwIiB5PSIzNTUiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEzIiBvcGFjaXR5PSIwLjA4OTMzMzMzMzMzMzMzMzMzIiBmaWxsPSIjZGRkIiAgLz48cmVjdCB4PSIwIiB5PSIzNzciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjUiIG9wYWNpdHk9IjAuMDIiIGZpbGw9IiNkZGQiICAvPjxyZWN0IHg9IjAiIHk9IjM5OCIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTYiIG9wYWNpdHk9IjAuMTE1MzMzMzMzMzMzMzMzMzQiIGZpbGw9IiMyMjIiICAvPjxyZWN0IHg9IjAiIHk9IjQzMSIgd2lkdGg9IjEwMCUiIGhlaWdodD0iOSIgb3BhY2l0eT0iMC4wNTQ2NjY2NjY2NjY2NjY2NyIgZmlsbD0iI2RkZCIgIC8+PHJlY3QgeD0iNSIgeT0iMCIgd2lkdGg9IjE1IiBoZWlnaHQ9IjEwMCUiIG9wYWNpdHk9IjAuMTA2NjY2NjY2NjY2NjY2NjciIGZpbGw9IiNkZGQiICAvPjxyZWN0IHg9IjI5IiB5PSIwIiB3aWR0aD0iMTgiIGhlaWdodD0iMTAwJSIgb3BhY2l0eT0iMC4xMzI2NjY2NjY2NjY2NjY2NSIgZmlsbD0iIzIyMiIgIC8+PHJlY3QgeD0iNTciIHk9IjAiIHdpZHRoPSIxMCIgaGVpZ2h0PSIxMDAlIiBvcGFjaXR5PSIwLjA2MzMzMzMzMzMzMzMzMzM0IiBmaWxsPSIjMjIyIiAgLz48cmVjdCB4PSI4MiIgeT0iMCIgd2lkdGg9IjEzIiBoZWlnaHQ9IjEwMCUiIG9wYWNpdHk9IjAuMDg5MzMzMzMzMzMzMzMzMzMiIGZpbGw9IiNkZGQiICAvPjxyZWN0IHg9IjExMyIgeT0iMCIgd2lkdGg9IjEyIiBoZWlnaHQ9IjEwMCUiIG9wYWNpdHk9IjAuMDgwNjY2NjY2NjY2NjY2NjYiIGZpbGw9IiMyMjIiICAvPjxyZWN0IHg9IjEzNyIgeT0iMCIgd2lkdGg9IjEzIiBoZWlnaHQ9IjEwMCUiIG9wYWNpdHk9IjAuMDg5MzMzMzMzMzMzMzMzMzMiIGZpbGw9IiNkZGQiICAvPjxyZWN0IHg9IjE2OSIgeT0iMCIgd2lkdGg9IjEwIiBoZWlnaHQ9IjEwMCUiIG9wYWNpdHk9IjAuMDYzMzMzMzMzMzMzMzMzMzQiIGZpbGw9IiMyMjIiICAvPjxyZWN0IHg9IjE4NCIgeT0iMCIgd2lkdGg9IjciIGhlaWdodD0iMTAwJSIgb3BhY2l0eT0iMC4wMzczMzMzMzMzMzMzMzMzMyIgZmlsbD0iI2RkZCIgIC8+PHJlY3QgeD0iMTk4IiB5PSIwIiB3aWR0aD0iMjAiIGhlaWdodD0iMTAwJSIgb3BhY2l0eT0iMC4xNSIgZmlsbD0iIzIyMiIgIC8+PHJlY3QgeD0iMjMzIiB5PSIwIiB3aWR0aD0iMTYiIGhlaWdodD0iMTAwJSIgb3BhY2l0eT0iMC4xMTUzMzMzMzMzMzMzMzMzNCIgZmlsbD0iIzIyMiIgIC8+PHJlY3QgeD0iMjYxIiB5PSIwIiB3aWR0aD0iNSIgaGVpZ2h0PSIxMDAlIiBvcGFjaXR5PSIwLjAyIiBmaWxsPSIjZGRkIiAgLz48cmVjdCB4PSIyNzIiIHk9IjAiIHdpZHRoPSIxNCIgaGVpZ2h0PSIxMDAlIiBvcGFjaXR5PSIwLjA5OCIgZmlsbD0iIzIyMiIgIC8+PHJlY3QgeD0iMjk4IiB5PSIwIiB3aWR0aD0iMTIiIGhlaWdodD0iMTAwJSIgb3BhY2l0eT0iMC4wODA2NjY2NjY2NjY2NjY2NiIgZmlsbD0iIzIyMiIgIC8+PHJlY3QgeD0iMzI3IiB5PSIwIiB3aWR0aD0iMTAiIGhlaWdodD0iMTAwJSIgb3BhY2l0eT0iMC4wNjMzMzMzMzMzMzMzMzMzNCIgZmlsbD0iIzIyMiIgIC8+PHJlY3QgeD0iMzU1IiB5PSIwIiB3aWR0aD0iMTMiIGhlaWdodD0iMTAwJSIgb3BhY2l0eT0iMC4wODkzMzMzMzMzMzMzMzMzMyIgZmlsbD0iI2RkZCIgIC8+PHJlY3QgeD0iMzc3IiB5PSIwIiB3aWR0aD0iNSIgaGVpZ2h0PSIxMDAlIiBvcGFjaXR5PSIwLjAyIiBmaWxsPSIjZGRkIiAgLz48cmVjdCB4PSIzOTgiIHk9IjAiIHdpZHRoPSIxNiIgaGVpZ2h0PSIxMDAlIiBvcGFjaXR5PSIwLjExNTMzMzMzMzMzMzMzMzM0IiBmaWxsPSIjMjIyIiAgLz48cmVjdCB4PSI0MzEiIHk9IjAiIHdpZHRoPSI5IiBoZWlnaHQ9IjEwMCUiIG9wYWNpdHk9IjAuMDU0NjY2NjY2NjY2NjY2NjciIGZpbGw9IiNkZGQiICAvPjwvc3ZnPg==);">
        <div class="wrap">
            <div class="icon-container">
                <span class="mega-octicon octicon-globe"></span>
            </div>
            <h1>Hello World</h1>
      <span class="article-read-time article-meta">
        <span class="octicon octicon-clock"></span> 10 minute read
      </span>

        </div>
    </div>


    <div class="wrap">

        <div class="toc-wrapper">
            <ol class="toc js-toc"></ol>
        </div>


        <div class="markdown-body content-body ">
            <p><a id="intro" title="Intro" class="toc-item"></a></p>

            <p>The <strong>Hello World</strong> project is a time-honored tradition in computer programming. It is a simple exercise that gets you started when learning something new. Let&rsquo;s get started with GitHub!</p>

            <p><strong>You&rsquo;ll learn how to:</strong></p>

            <ul>
                <li>Create and use a repository</li>
                <li>Start and manage a new branch</li>
                <li>Make changes to a file and push them to GitHub as commits</li>
                <li>Open and merge a pull request</li>
            </ul>


            <p><a id="what" title="내용증명이란?" class="toc-item"></a></p>

            <h2>내용증명이란?</h2>

            <p>GitHub is a code hosting platform for version control and collaboration. It lets you and others work together on projects from anywhere.</p>

            <p>This tutorial teaches you GitHub essentials like <em>repositories</em>, <em>branches</em>, <em>commits</em>, and <em>pull requests</em>. You&rsquo;ll create your own Hello World repository and learn GitHub&rsquo;s pull request workflow, a popular way to create and review code.</p>

            <h4>No coding necessary</h4>

            <p>To complete this tutorial, you need a <a href="http://github.com">GitHub.com account</a> and Internet access. You don&rsquo;t need to know how to code, use the command line, or install Git (the version control software GitHub is built on).</p>

            <blockquote><p><strong>Tip:</strong> Open this guide in a separate browser window (or tab) so you can see it while you complete the steps in the tutorial.</p></blockquote>

            <p><a id="repository" title="Create a Repository" class="toc-item"></a></p>

            <h2>Step 1. Create a Repository</h2>

            <p>A <strong>repository</strong> is usually used to organize a single project. Repositories can contain folders and files, images, videos, spreadsheets, and data sets &ndash; anything your project needs. We recommend including a <em>README</em>, or a file with information about your project. GitHub makes it easy to add one at the same time you create your new repository. <em>It also offers other common options such as a license file.</em></p>

            <p>Your <code>hello-world</code> repository can be a place where you store ideas, resources, or even share and discuss things with others.</p>

            <h3>To create a new repository</h3>

            <ol>
                <li>In the upper right corner, next to your username, click <span class="octicon octicon-plus"></span> and then click <strong>New repository</strong>.</li>
                <li>Name your repository <code>hello-world</code>.</li>
                <li>Write a short description.</li>
                <li>Select <strong>Initialize this repository with a README</strong>.</li>
            </ol>


            <p><img src="/site/help/ccmail/create-new-repo.png" alt="new-repo-form" /></p>

            <p>Click <strong>Create repository</strong>. <img class='emoji' title=':tada:' alt=':tada:' src='https://assets.github.com/images/icons/emoji/unicode/1f389.png' height='20' width='20' align='absmiddle' /></p>

            <p><a id="branch" title="Create a Branch" class="toc-item"></a></p>

            <h2>Step 2. Create a Branch</h2>

            <p><strong>Branching</strong> is the way to work on different versions of a repository at one time.</p>

            <p>By default your repository has one branch named <code>master</code> which is considered to be the definitive branch. We use branches to experiment and make edits before committing them to <code>master</code>.</p>

            <p>When you create a branch off the <code>master</code> branch, you&rsquo;re making a copy, or snapshot, of <code>master</code> as it was at that point in time. If someone else made changes to the <code>master</code> branch while you were working on your branch, you could pull in those updates.</p>

            <p>This diagram shows:</p>

            <ul>
                <li>The <code>master</code> branch</li>
                <li>A new branch called <code>feature</code> (because we&rsquo;re doing &lsquo;feature work&rsquo; on this branch)</li>
                <li>The journey that <code>feature</code> takes before it&rsquo;s merged into <code>master</code></li>
            </ul>


            <p><img src="branching.png" alt="a branch" /></p>

            <p>Have you ever saved different versions of a file? Something like:</p>

            <ul>
                <li><code>story.txt</code></li>
                <li><code>story-joe-edit.txt</code></li>
                <li><code>story-joe-edit-reviewed.txt</code></li>
            </ul>


            <p>Branches accomplish similar goals in GitHub repositories.</p>

            <p>Here at GitHub, our developers, writers, and designers use branches for keeping bug fixes and feature work separate from our <code>master</code> (production) branch. When a change is ready, they merge their branch into <code>master</code>.</p>

            <h3>To create a new branch</h3>

            <ol>
                <li>Go to your new repository <code>hello-world</code>.</li>
                <li>Click the drop down at the top of the file list that says <strong>branch: master</strong>.</li>
                <li>Type a branch name, <code>readme-edits</code>, into the new branch text box.</li>
                <li>Select the blue <strong>Create branch</strong> box or hit &ldquo;Enter&rdquo; on your keyboard.</li>
            </ol>


            <p><img src="/site/help/ccmail/readme-edits.gif" alt="branch gif" /></p>

            <p>Now you have two branches, <code>master</code> and <code>readme-edits</code>. They look exactly the same, but not for long! Next we&rsquo;ll add our changes to the new branch.</p>

            <p><a id="commit" title="Make a Commit" class="toc-item"></a></p>

            <h2>Step 3. Make and commit changes</h2>

            <p>Bravo! Now, you&rsquo;re on the code view for your <code>readme-edits</code> branch, which is a copy of <code>master</code>. Let&rsquo;s make some edits.</p>

            <p>On GitHub, saved changes are called <em>commits</em>. Each commit has an associated <em>commit message</em>, which is a description explaining why a particular change was made. Commit messages capture the history of your changes, so other contributors can understand what you’ve done and why.</p>

            <h4>Make and commit changes</h4>

            <ol>
                <li>Click the <code>README.md</code> file.</li>
                <li>Click the <span class="octicon octicon-pencil"></span> pencil icon in the upper right corner of the file view to edit.</li>
                <li>In the editor, write a bit about yourself.</li>
                <li>Write a commit message that describes your changes.</li>
                <li>Click <strong>Commit changes</strong> button.</li>
            </ol>


            <p><img src="commit.png" alt="commit" /></p>

            <p>These changes will be made to just the README file on your <code>readme-edits</code> branch, so now this branch contains content that&rsquo;s different from <code>master</code>.</p>

            <p><a id="pr" title="Open a Pull Request" class="toc-item"></a></p>

            <h2>Step 4. Open a Pull Request</h2>

            <p>Nice edits! Now that you have changes in a branch off of <code>master</code>, you can open a <em>pull request</em>.</p>

            <p>Pull Requests are the heart of collaboration on GitHub. When you open a <em>pull request</em>, you&rsquo;re proposing your changes and requesting that someone review and pull in your contribution and merge them into their branch. Pull requests show <em>diffs</em>, or differences, of the content from both branches. The changes, additions, and subtractions are shown in green and red.</p>

            <p>As soon as you make a commit, you can open a pull request and start a discussion, even before the code is finished.</p>

            <p>By using GitHub&rsquo;s <a href="https://help.github.com/articles/about-writing-and-formatting-on-github/#text-formatting-toolbar">@mention system</a> in your pull request message, you can ask for feedback from specific people or teams, whether they&rsquo;re down the hall or 10 time zones away.</p>

            <p>You can even open pull requests in your own repository and merge them yourself. It&rsquo;s a great way to learn the GitHub Flow before working on larger projects.</p>

            <h4>Open a Pull Request for changes to the README</h4>

            <p><em>Click on the image for a larger version</em></p>

            <table>
                <thead>
                <tr>
                    <th> Step </th>
                    <th> Screenshot </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td> Click the <span class="octicon octicon-git-pull-request"></span> <strong>Pull Request</strong> tab, then from the Pull Request page, click the green <strong>New pull request</strong> button. </td>
                    <td> <img src="pr-tab.gif" alt="pr-tab" /> </td>
                </tr>
                <tr>
                    <td> Select the branch you made, <code>readme-edits</code>, to compare with <code>master</code> (the original). </td>
                    <td> <a href="pick-branch.png"><img src="pick-branch.png" alt="branch" /></a> </td>
                </tr>
                <tr>
                    <td> Look over your changes in the diffs on the Compare page, make sure they&rsquo;re what you want to submit. </td>
                    <td> <a href="diff.png"><img src="diff.png" alt="diff" /></a> </td>
                </tr>
                <tr>
                    <td> When you&rsquo;re satisfied that these are the changes you want to submit, click the big green <strong>Create Pull Request</strong> button. </td>
                    <td> <a href="create-pr.png"><img src="create-pr.png" alt="create-pull" /></a> </td>
                </tr>
                <tr>
                    <td> Give your pull request a title and write a brief description of your changes. </td>
                    <td> <img src="pr-form.png" alt="pr-form" /></td>
                </tr>
                </tbody>
            </table>


            <p>When you&rsquo;re done with your message, click <strong>Create pull request</strong>!</p>

            <hr />

            <blockquote><p><strong>Tip</strong>: You can use <a href="https://help.github.com/articles/basic-writing-and-formatting-syntax/#using-emoji">emoji</a> and <a href="https://help.github.com/articles/file-attachments-on-issues-and-pull-requests/">drag and drop images and gifs</a> onto comments and Pull Requests.</p></blockquote>

            <p><a id="merge" title="Merge Pull Request" class="toc-item"></a></p>

            <h2>Step 5. Merge your Pull Request</h2>

            <p>In this final step, it&rsquo;s time to bring your changes together &ndash; merging your <code>readme-edits</code> branch into the <code>master</code> branch.</p>

            <ol>
                <li>Click the green <strong>Merge pull request</strong> button to merge the changes into <code>master</code>.</li>
                <li>Click <strong>Confirm merge</strong>.</li>
                <li>Go ahead and delete the branch, since its changes have been incorporated, with the <strong>Delete branch</strong> button in the purple box.</li>
            </ol>


            <p><img src="merge-button.png" alt="merge" />
                <img src="delete-button.png" alt="delete" /></p>

            <h3>Celebrate!</h3>

            <p>By completing this tutorial, you&rsquo;ve learned to create a project and make a pull request on GitHub! <img class='emoji' title=':tada:' alt=':tada:' src='https://assets.github.com/images/icons/emoji/unicode/1f389.png' height='20' width='20' align='absmiddle' /> <img class='emoji' title=':octocat:' alt=':octocat:' src='https://assets.github.com/images/icons/emoji/octocat.png' height='20' width='20' align='absmiddle' /> <img class='emoji' title=':zap:' alt=':zap:' src='https://assets.github.com/images/icons/emoji/unicode/26a1.png' height='20' width='20' align='absmiddle' /></p>

            <p>Here&rsquo;s what you accomplished in this tutorial:</p>

            <ul>
                <li>Created an open source repository</li>
                <li>Started and managed a new branch</li>
                <li>Changed a file and committed those changes to GitHub</li>
                <li>Opened and merged a Pull Request</li>
            </ul>


            <p>Take a look at your GitHub profile and you&rsquo;ll see your new <a href="https://help.github.com/articles/viewing-contributions">contribution squares</a>!</p>

            <p>If you want to learn more about the power of pull requests, we recommend reading the <a href="http://guides.github.com/overviews/flow/">GitHub Flow Guide</a>. You might also visit <a href="http://github.com/explore">GitHub Explore</a> and get involved in an Open Source project <img class='emoji' title=':octocat:' alt=':octocat:' src='https://assets.github.com/images/icons/emoji/octocat.png' height='20' width='20' align='absmiddle' /></p>

            <hr />

            <blockquote><p><strong>Tip</strong>: Check out our other <a href="http://guides.github.com">Guides</a> and <a href="http://youtube.com/githubguides">YouTube Channel</a> for more GitHub how-tos.</p></blockquote>


            <p class="last-updated">Last updated February, 2016</p>
        </div>
    </div>
</article>


<footer>
    <div class="wrap">
        <span class="mega-octicon octicon-mark-github"></span>
        <p>
            <a href="https://github.com">GitHub</a> is the best way to build and ship software.<br />
            Powerful collaboration, code review, and code management for open source and private projects.
        </p>
    </div>
</footer>

</body>
</html>


@stop

