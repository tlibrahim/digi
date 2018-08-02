  .tabs {
    margin: 0 auto;
    padding: 0 10px;
  }
  #tab-button {
    display: table;
    table-layout: fixed;
    width: 100%;
    margin: 0;
    padding: 0;
    list-style: none;
  }
  #tab-button li {
    display: table-cell;
    width: 20%;
  }
  #tab-button li a {
    display: block;
    padding: .5em;
    background: #eee;
    border: 1px solid #ddd;
    text-align: center;
    color: #000;
    text-decoration: none;
  }
  #tab-button li:not(:first-child) a {
    border-left: none;
  }
  #tab-button li a:hover,
  #tab-button .is-active a {
    border-bottom-color: transparent;
    background: #fff;
  }
  .tab-contents {
    padding: 20px;
    border: 1px solid #ddd;
  }
  .tab-button-outer {
    display: none;
  }
  .tab-contents {
    margin-top: 20px;
  }
  @media screen and (min-width: 768px) {
    .tab-button-outer {
      position: relative;
      z-index: 2;
      display: block;
    }
    .tab-select-outer {
      display: none;
    }
    .tab-contents {
      position: relative;
      top: -1px;
      margin-top: 0;
    }
  }

  .bg-gray-lighter{
    min-height:50px !important
  }
  .block-content {
    padding-bottom:20px
  }