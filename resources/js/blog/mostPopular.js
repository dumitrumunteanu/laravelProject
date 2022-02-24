const postTemplate = document.querySelector('[popular-post-template]');
const posts = document.querySelector('[posts-list]');

axios.get('/api/blog/most-popular').then(({data}) => {
    data.forEach(postData => {
        const post = postTemplate.content.cloneNode(true).children[0];

        post.querySelector('#title').innerText = postData.title;

        post.querySelector('#link').href = `/blog/${postData.id}`;

        post.querySelector('#description').innerText = postData.description;

        if (postData.commentsCount > 99) {
            post.querySelector('#commentCount').innerText = '99+';
        }
        else if (!postData.commentsCount) {
            post.querySelector('#commentCount').hidden = true;
        }
        else {
            post.querySelector('#commentCount').innerText = postData.commentsCount;
        }

        post.querySelector('#image').src = `storage/blog_img/${postData.image}`;

        posts.append(post);
    });
});
