// const request = require('request');
// const cheerio = require('cheerio');
// const fs = require('fs');
// const writeStream = fs.createWriteStream('post.csv');

// // Write Headers
// writeStream.write(`Title,Link,Date \n`);

// request('http://codedemos.com/sampleblog', (error, response, html) => {
//   if (!error && response.statusCode == 200) {
//     const $ = cheerio.load(html);

//     $('.post-preview').each((i, el) => {
//       const title = $(el)
//         .find('.post-title')
//         .text()
//         .replace(/\s\s+/g, '');
//       const link = $(el)
//         .find('a')
//         .attr('href');
//       const date = $(el)
//         .find('.post-date')
//         .text()
//         .replace(/,/, '');

//       // Write Row To CSV
//       writeStream.write(`${title}, ${link}, ${date} \n`);
//     });

//     console.log('Scraping Done...');
//   }
// });

const fs = require('fs');
const cheerio = require('cheerio');
const got = require('got');

const vgmUrl= 'https://www.vgmusic.com/music/console/nintendo/nes';

got(vgmUrl).then(response => {
  const $ = cheerio.load(response.body);
  console.log($('title')[0]);
}).catch(err => {
  console.log(err);
});
