# DMU-Net.org

[![License: CC BY-SA 4.0](https://img.shields.io/badge/License-CC%20BY--SA%204.0-lightgrey.svg)](http://creativecommons.org/licenses/by-sa/4.0/)

Official Repository for the website https://www.dmu-net.org

## Project Architecture
- Branch **[Master](https://github.com/DEKHTIARJonathan/dmu-net.org)**: The DMU-Net website
- Branch **[STEP-2-ThreeJS-BatchConverter](https://github.com/DEKHTIARJonathan/dmu-net.org/tree/STEP-2-ThreeJS-BatchConverter)**: The batch script used to convert STEP Files to ThreeJS readable files.

## Branch Description

This branch contain the source code which run the website: https://www.dmu-net.org

The Repository is organised as followed:

- **css**: contains all the CSS Files necessary for the projects.
- **js**: contains all the Javascript Files necessary for the projects.
- **data_loader**: contains the files used to load the database.
- **dataset**: contains all the CAD Models converted in ThreeJS readable format.
- **img**: contains all the Images necessary for the projects.
- **parts**: contains php files that are shared and used by many files.

## Installation
1. Rename the file: **config.dist.php** to **config.php** and update the file with the correct settings in order to allow database connection.
2. Comment the line *Deny from All* in **install/.htaccess**.
3. Go to the http://server-adress.tld/install/ - The website database is now installed.
4. Recomment the line *Deny from All* in **install/.htaccess** or **delete the folder install/**.
5. Use the batch script available here](https://github.com/DEKHTIARJonathan/dmu-net.org/tree/STEP-2-ThreeJS-BatchConverter) to convert a few CAD Models into ThreeJS JSON Files.
    1. Copy the file **generation.csv** into the folder **data_loader/** of the dmu-net website.
    2. Copy the all the folders generated in **output/** into the folder **dataset/** of the dmu-net website.
6. Comment the line *Deny from All* in **data_loader/.htaccess**.
7. Go to the http://server-adress.tld/data_loader/ - The CAD Models are now in the database.
8. Recomment the line *Deny from All* in **data_loader/.htaccess** or **delete the folder data_loader/**.


## Cite This Work
*DEKHTIAR Jonathan, DURUPT Alexandre, BRICOGNE Matthieu, EYNARD Benoit, ROWSON Harvey and KIRITSIS Dimitris* (2017). <br>
Deep Machine Learning for Big Data Engineering Applications - Survey, Opportunities and Case Study.
```
@article {DEKHTIAR2017:DMUNet,
    author = {DEKHTIAR, Jonathan and DURUPT, Alexandre and BRICOGNE, Matthieu and EYNARD, Benoit and ROWSON, Harvey and KIRITSIS, Dimitris},
    title  = {Deep Machine Learning for Big Data Engineering Applications - Survey, Opportunities and Case Study},
    month  = {jan},
    year   = {2017}
}
```

## Open Source Licence - Creative Commons:

### You are free to:

- **Share** — copy and redistribute the material in any medium or format
- **Adapt** — remix, transform, and build upon the material for any purpose, even commercially.

*The licensor cannot revoke these freedoms as long as you follow the license terms.*

### Under the following terms:

- **Attribution** — You must give appropriate credit, provide a link to the license, and indicate if changes were made. You may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.
- **ShareAlike** — If you remix, transform, or build upon the material, you must distribute your contributions under the same license as the original.
 - **No additional restrictions** — You may not apply legal terms or technological measures that legally restrict others from doing anything the license permits.

## Maintainer

* **Lead Developer:** Jonathan DEKHTIAR
* **Contact:** [contact@jonathandekhtiar.eu](mailto:contact@jonathandekhtiar.eu)
* **Twitter:** [@born2data](https://twitter.com/born2data)
* **LinkedIn:** [JonathanDEKHTIAR](https://fr.linkedin.com/in/jonathandekhtiar)
* **Personal Website:** [JonathanDEKHTIAR](http://www.jonathandekhtiar.eu)
* **RSS Feed:** [FeedCrunch.io](https://www.feedcrunch.io/@dataradar/)
* **Tech. Blog:** [born2data.com](http://www.born2data.com/)
* **Github:** [DEKHTIARJonathan](https://github.com/DEKHTIARJonathan)

## Contacts

* **Jonathan DEKHTIAR:** [contact@jonathandekhtiar.eu](mailto:contact@jonathandekhtiar.eu)
* **Alexandre DURUPT:** [alexandre.durupt@utc.fr](mailto:alexandre.durupt@utc.fr)
* **Matthieu BRICOGNE:** [matthieu.bricogne@utc.fr](mailto:matthieu.bricogne@utc.fr)
* **Benoit EYNARD:** [benoit.eynard@utc.fr](mailto:benoit.eynard@utc.fr)
* **Harvey ROWSON:** [rowson@deltacad.fr](mailto:rowson@deltacad.fr)
* **Dimitris KIRITSIS:** [dimitris.kiritsis@epfl.ch](mailto:dimitris.kiritsis@epfl.ch)
