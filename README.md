<!-- Improved compatibility of back to top link: See: https://github.com/othneildrew/Best-README-Template/pull/73 -->
<a name="readme-top"></a>
<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Don't forget to give the project a star!
*** Thanks again! Now go create something AMAZING! :D
-->



<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->

[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]


<!-- PROJECT LOGO -->
<br />
<div align="center">

[//]: # (  <a href="https://github.com/kutasman/pysaka-backend">)
[//]: # (    <img src="images/logo.png" alt="Logo" width="80" height="80">)
[//]: # (  </a>)

<h3 align="center">Pysaka.fun</h3>

  <p align="center">
    Pysaka.fun - it's the small web literary game where users can write some small texts in collaboration with other users.
    Also, it's a small sandbox for the young developers to improve their skills
    <br />
    <a href="https://github.com/kutasman/pysaka-backend"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/kutasman/pysaka-backend/issues">Report Bug</a>
    ·
    <a href="https://github.com/kutasman/pysaka-backend/issues">Request Feature</a>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

[//]: # ([![Product Name Screen Shot][product-screenshot]]&#40;https://example.com&#41;)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Built With

* [![Vue][Vue.js]][Vue-url]
* [![Laravel][Laravel.com]][Laravel-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple example steps.

### Prerequisites

*   You must have node & npm installed. You may [download it here](https://nodejs.org/uk/download/)

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/kutasman/pysaka-backend.git pysaka && cd pysaka
   ```
2. Install composer dependencies
   ```sh
   composer install
   ```
3. Setup env config `cp .env.example .env` and update it with required data
   ```shell
   php artisan key:generate
   php artisan storage:link
   ```
4. Now you can run local server
   ```sh
   php artisan serve
   ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Tests
```shell
php artisan test
```

<!-- ROADMAP -->
## Roadmap

- [ ] Private games with particular users
- [ ] Advanced games settings: rounds duration
- [ ] Ability to select own exlibris
- [ ] Sign up with Google account

See the [open issues](https://github.com/kutasman/pysaka-backend/issues) for a full list of proposed features (and known issues).

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- CONTACT -->
## Contact

Eugene Kutas - [LinkedIn](https://www.linkedin.com/in/eugene-kutas/) - evgenij.kutas@gmail.com

Project Link: [https://github.com/kutasman/pysaka-backend](https://github.com/kutasman/pysaka-backend)

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/kutasman/pysaka-backend.svg?style=for-the-badge
[contributors-url]: https://github.com/kutasman/pysaka-backend/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/kutasman/pysaka-backend.svg?style=for-the-badge
[forks-url]: https://github.com/kutasman/pysaka-backend/network/members
[stars-shield]: https://img.shields.io/github/stars/kutasman/pysaka-backend.svg?style=for-the-badge
[stars-url]: https://github.com/kutasman/pysaka-backend/stargazers
[issues-shield]: https://img.shields.io/github/issues/kutasman/pysaka-backend.svg?style=for-the-badge
[issues-url]: https://github.com/kutasman/pysaka-backend/issues
[license-shield]: https://img.shields.io/github/license/kutasman/pysaka-backend.svg?style=for-the-badge
[license-url]: https://github.com/kutasman/pysaka-backend/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/eugene-kutas
[product-screenshot]: images/screenshot.png
[Next.js]: https://img.shields.io/badge/next.js-000000?style=for-the-badge&logo=nextdotjs&logoColor=white
[Next-url]: https://nextjs.org/
[React.js]: https://img.shields.io/badge/React-20232A?style=for-the-badge&logo=react&logoColor=61DAFB
[React-url]: https://reactjs.org/
[Vue.js]: https://img.shields.io/badge/Vue.js-35495E?style=for-the-badge&logo=vuedotjs&logoColor=4FC08D
[Vue-url]: https://vuejs.org/
[Angular.io]: https://img.shields.io/badge/Angular-DD0031?style=for-the-badge&logo=angular&logoColor=white
[Angular-url]: https://angular.io/
[Svelte.dev]: https://img.shields.io/badge/Svelte-4A4A55?style=for-the-badge&logo=svelte&logoColor=FF3E00
[Svelte-url]: https://svelte.dev/
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
[JQuery.com]: https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white
[JQuery-url]: https://jquery.com 
