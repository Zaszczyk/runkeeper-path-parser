<?php
use MateuszBlaszczyk\RunkeeperPathParser\Parser;

/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 25.04.2016
 * Time: 00:08
 */
class ParserTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->getJson1();
    }

    public function getJson()
    {
        $parser = new Parser($this->getJson1());
        $results = $parser->getJson();
        $this->assertJson($results);
    }

    /**
     * @group json1
     */
    public function testParseJson1()
    {
        $parser = new Parser($this->getJson1());
        $results = $parser->parse();
        $this->assertEquals(1064, count($results));

        foreach ($results as $r) {
            $this->assertEquals(5, count($r));
        }

        $this->assertArraySubset([
            'latitude' => '50.671549',
            'longitude' => '18.023479',
            'altitude' => '158.17',
            'distance' => '0.0',
            'timestamp' => '0'
        ], $results[0]);

        $this->assertArraySubset([
            'latitude' => '50.671494',
            'longitude' => '18.023444',
            'altitude' => '158.29',
            'distance' => '0.00659',
            'timestamp' => '3'
        ], $results[1]);

        $this->assertArraySubset([
            'latitude' => '50.671412',
            'longitude' => '18.023365',
            'altitude' => '158.38',
            'distance' => '0.01728',
            'timestamp' => '10'
        ], $results[2]);
        
        $this->assertArraySubset([
            'latitude' => '50.671595',
            'longitude' => '18.023614',
            'altitude' => '158.00',
            'distance' => '11.70241',
            'timestamp' => '4554'
        ], $results[1063]);
    }
    
    public function testFindDistanceByTimestamp1(){
        $parser = new Parser($this->getJson1());
        $results = $parser->findDistanceByTimestamp(null);
        $this->assertEquals(null, $results);
    }
    
    public function testFindDistanceByTimestamp2(){
        $parser = new Parser($this->getJson1());
        $results = $parser->findDistanceByTimestamp(0);
        $this->assertEquals(null, $results);
    }

    public function testFindDistanceByTimestamp3(){
        $parser = new Parser($this->getJson1());
        $results = $parser->findDistanceByTimestamp('bla');
        $this->assertEquals(null, $results);
    }

    public function testFindDistanceByTimestamp4(){
        $parser = new Parser($this->getJson1());
        $results = $parser->findDistanceByTimestamp(2.930176258087158);
        $this->assertEquals(6.594367105793855, $results);
    }

    public function testFindDistanceByTimestamp5(){
        $parser = new Parser($this->getJson1());
        $results = $parser->findDistanceByTimestamp(28.92004483938217);
        $this->assertEquals(59.82022047828458, $results);
    }

    public function getJson1()
    {
        return json_decode('{
  "utc_offset": 2,
  "next": "/nextFitnessActivity/47734780/1462208167000",
  "notes": "Opole! :D",
  "distance": [
    {
      "distance": 0,
      "timestamp": 0
    },
    {
      "distance": 6.594367105793855,
      "timestamp": 2.930176258087158
    },
    {
      "distance": 17.277624024539563,
      "timestamp": 9.915750324726105
    },
    {
      "distance": 28.246480869498626,
      "timestamp": 16.83679163455963
    },
    {
      "distance": 38.513763429616155,
      "timestamp": 20.90395486354828
    },
    {
      "distance": 49.516341572608425,
      "timestamp": 24.91493064165115
    },
    {
      "distance": 59.82022047828458,
      "timestamp": 28.92004483938217
    },
    {
      "distance": 70.7092602395093,
      "timestamp": 32.9169984459877
    },
    {
      "distance": 81.86418309417479,
      "timestamp": 36.91759347915649
    },
    {
      "distance": 93.42831856913685,
      "timestamp": 40.89901906251907
    },
    {
      "distance": 105.12031261042813,
      "timestamp": 44.9114254117012
    },
    {
      "distance": 116.39798434158601,
      "timestamp": 48.9062642455101
    },
    {
      "distance": 126.97809828176615,
      "timestamp": 52.90997570753098
    },
    {
      "distance": 139.38311698655812,
      "timestamp": 57.90779548883438
    },
    {
      "distance": 151.7562065899223,
      "timestamp": 62.88045537471771
    },
    {
      "distance": 162.98821132578433,
      "timestamp": 66.91558051109314
    },
    {
      "distance": 173.50320398418754,
      "timestamp": 70.90563756227493
    },
    {
      "distance": 184.91817184392846,
      "timestamp": 74.91661494970322
    },
    {
      "distance": 195.86897994627185,
      "timestamp": 78.90487509965897
    },
    {
      "distance": 206.5332477741859,
      "timestamp": 82.91347640752792
    },
    {
      "distance": 217.7394258825641,
      "timestamp": 86.89318424463272
    },
    {
      "distance": 227.9897781717378,
      "timestamp": 90.88678056001663
    },
    {
      "distance": 238.35108145770482,
      "timestamp": 94.91479206085205
    },
    {
      "distance": 250.60387266673908,
      "timestamp": 99.90488171577454
    },
    {
      "distance": 262.23381562075724,
      "timestamp": 103.8931249976158
    },
    {
      "distance": 274.2186334284227,
      "timestamp": 107.9178832173347
    },
    {
      "distance": 286.37234992118897,
      "timestamp": 112.9054253697395
    },
    {
      "distance": 298.5016264927277,
      "timestamp": 117.8969960808754
    },
    {
      "distance": 309.7994702410386,
      "timestamp": 121.8822475075722
    },
    {
      "distance": 320.74607250048575,
      "timestamp": 125.8988748788834
    },
    {
      "distance": 332.6798483812751,
      "timestamp": 129.88852542638782
    },
    {
      "distance": 344.53782936797415,
      "timestamp": 134.8848271965981
    },
    {
      "distance": 356.6978641236689,
      "timestamp": 139.9116825461388
    },
    {
      "distance": 368.99629216254107,
      "timestamp": 144.911514878273
    },
    {
      "distance": 381.0633170609538,
      "timestamp": 149.8974485397339
    },
    {
      "distance": 391.66263791909927,
      "timestamp": 153.9171625971794
    },
    {
      "distance": 402.71225956594003,
      "timestamp": 157.8979442715645
    },
    {
      "distance": 414.07553332389034,
      "timestamp": 161.9007692933083
    },
    {
      "distance": 425.32507305334946,
      "timestamp": 166.9435971975327
    },
    {
      "distance": 436.107755381998,
      "timestamp": 171.9215233922005
    },
    {
      "distance": 447.601818526008,
      "timestamp": 177.9288940429688
    },
    {
      "distance": 457.78859862289585,
      "timestamp": 181.916818022728
    },
    {
      "distance": 470.31148085000893,
      "timestamp": 186.8915907144547
    },
    {
      "distance": 482.1020180866563,
      "timestamp": 190.8998831510544
    },
    {
      "distance": 494.45674257091224,
      "timestamp": 195.8680667281151
    },
    {
      "distance": 505.78793427387143,
      "timestamp": 200.9414580464363
    },
    {
      "distance": 515.8653118870018,
      "timestamp": 204.6199218034744
    },
    {
      "distance": 526.3541533232384,
      "timestamp": 208.9364018440247
    },
    {
      "distance": 536.7458497925,
      "timestamp": 212.9293947815895
    },
    {
      "distance": 548.322360478043,
      "timestamp": 217.9144399166107
    },
    {
      "distance": 559.8801642846028,
      "timestamp": 222.8989564776421
    },
    {
      "distance": 570.3897813771921,
      "timestamp": 226.9221653342247
    },
    {
      "distance": 582.3040754042747,
      "timestamp": 231.9170317649841
    },
    {
      "distance": 592.5375042529907,
      "timestamp": 235.9259577393532
    },
    {
      "distance": 604.408695200355,
      "timestamp": 240.9302534461021
    },
    {
      "distance": 616.2608886882832,
      "timestamp": 245.9200437664986
    },
    {
      "distance": 626.6207379288932,
      "timestamp": 249.9024028778076
    },
    {
      "distance": 636.7162034499167,
      "timestamp": 253.9086167216301
    },
    {
      "distance": 646.9399545112652,
      "timestamp": 257.9204701781273
    },
    {
      "distance": 658.1586411375472,
      "timestamp": 262.8551857471466
    },
    {
      "distance": 668.146651861006,
      "timestamp": 266.9251835942268
    },
    {
      "distance": 678.2631977499033,
      "timestamp": 270.9127908349037
    },
    {
      "distance": 688.4600866023793,
      "timestamp": 274.9151801466942
    },
    {
      "distance": 699.2292407724564,
      "timestamp": 278.9174304008484
    },
    {
      "distance": 711.0974153309359,
      "timestamp": 283.92279535532
    },
    {
      "distance": 721.2359258370994,
      "timestamp": 287.9241214990616
    },
    {
      "distance": 733.0755699918336,
      "timestamp": 292.9222133755684
    },
    {
      "distance": 745.448525528936,
      "timestamp": 297.924323618412
    },
    {
      "distance": 756.9358284326569,
      "timestamp": 302.9245515465736
    },
    {
      "distance": 769.0191482206742,
      "timestamp": 307.9235184788704
    },
    {
      "distance": 779.6370542128899,
      "timestamp": 312.9285167455673
    },
    {
      "distance": 790.4777131249549,
      "timestamp": 317.9246334433556
    },
    {
      "distance": 801.9454699332528,
      "timestamp": 322.9078978300095
    },
    {
      "distance": 813.3130921997027,
      "timestamp": 326.9219906330109
    },
    {
      "distance": 824.3872268731243,
      "timestamp": 330.916207075119
    },
    {
      "distance": 835.7379354354229,
      "timestamp": 335.9127516150475
    },
    {
      "distance": 846.9626440677632,
      "timestamp": 341.9298070669174
    },
    {
      "distance": 857.9566566779351,
      "timestamp": 349.9186559319496
    },
    {
      "distance": 868.4242062947059,
      "timestamp": 354.9215344190598
    },
    {
      "distance": 879.205381242617,
      "timestamp": 360.9221829175949
    },
    {
      "distance": 890.8466263997908,
      "timestamp": 367.8943787813187
    },
    {
      "distance": 902.2288432852863,
      "timestamp": 375.9067641496658
    },
    {
      "distance": 914.635609007595,
      "timestamp": 383.9436094760895
    },
    {
      "distance": 926.9561796856058,
      "timestamp": 388.9198954105377
    },
    {
      "distance": 937.0315687381584,
      "timestamp": 392.9189487695694
    },
    {
      "distance": 948.6080061789319,
      "timestamp": 397.8941000103951
    },
    {
      "distance": 959.7512572997041,
      "timestamp": 401.9341431260109
    },
    {
      "distance": 971.0462897000449,
      "timestamp": 405.922071993351
    },
    {
      "distance": 982.0537665679232,
      "timestamp": 409.8923261761665
    },
    {
      "distance": 992.9062517080476,
      "timestamp": 413.874011695385
    },
    {
      "distance": 1003.8047800664568,
      "timestamp": 417.9061740040779
    },
    {
      "distance": 1015.8464756383875,
      "timestamp": 421.9191375374794
    },
    {
      "distance": 1027.6477273514163,
      "timestamp": 425.9231501817703
    },
    {
      "distance": 1039.959929078235,
      "timestamp": 429.9209381937981
    },
    {
      "distance": 1052.79675684333,
      "timestamp": 433.8947361707687
    },
    {
      "distance": 1063.6905577916616,
      "timestamp": 437.8939384222031
    },
    {
      "distance": 1074.834607963181,
      "timestamp": 441.889002263546
    },
    {
      "distance": 1085.503570147556,
      "timestamp": 445.889955997467
    },
    {
      "distance": 1096.8450031803452,
      "timestamp": 449.8931273818016
    },
    {
      "distance": 1108.12905430941,
      "timestamp": 453.9240952134132
    },
    {
      "distance": 1119.1247025912746,
      "timestamp": 457.922176361084
    },
    {
      "distance": 1130.2595975744184,
      "timestamp": 461.9019374847412
    },
    {
      "distance": 1140.8301731867975,
      "timestamp": 465.921097278595
    },
    {
      "distance": 1151.6112975783665,
      "timestamp": 469.9199976325035
    },
    {
      "distance": 1162.00858223485,
      "timestamp": 473.9293909072876
    },
    {
      "distance": 1173.4762713709254,
      "timestamp": 477.8938699960709
    },
    {
      "distance": 1184.4104424305094,
      "timestamp": 481.8874847888947
    },
    {
      "distance": 1195.5845449623396,
      "timestamp": 485.921445608139
    },
    {
      "distance": 1206.9667668162936,
      "timestamp": 489.9174419045448
    },
    {
      "distance": 1217.8902426492443,
      "timestamp": 493.9302999377251
    },
    {
      "distance": 1228.813718249778,
      "timestamp": 497.9222159385681
    },
    {
      "distance": 1239.8430290630492,
      "timestamp": 501.8840488195419
    },
    {
      "distance": 1251.1909380538914,
      "timestamp": 505.8978455066681
    },
    {
      "distance": 1262.3105215033274,
      "timestamp": 509.9312393665314
    },
    {
      "distance": 1273.2791739752902,
      "timestamp": 513.9463092684746
    },
    {
      "distance": 1284.1520939972354,
      "timestamp": 517.9120476841928
    },
    {
      "distance": 1295.2432812032146,
      "timestamp": 521.8864986300467
    },
    {
      "distance": 1306.109942127844,
      "timestamp": 525.8972870111465
    },
    {
      "distance": 1317.0376976849407,
      "timestamp": 529.8995100855827
    },
    {
      "distance": 1328.1689378502163,
      "timestamp": 533.8946027159691
    },
    {
      "distance": 1339.268473530143,
      "timestamp": 537.8944241404533
    },
    {
      "distance": 1350.2640831787473,
      "timestamp": 541.9243574142456
    },
    {
      "distance": 1361.262503777987,
      "timestamp": 545.9191459417343
    },
    {
      "distance": 1371.7772813348008,
      "timestamp": 549.925998210907
    },
    {
      "distance": 1382.2547808956751,
      "timestamp": 553.9201037287712
    },
    {
      "distance": 1393.4560597361815,
      "timestamp": 557.9188349843025
    },
    {
      "distance": 1404.3959571249356,
      "timestamp": 561.9176114797592
    },
    {
      "distance": 1415.0600089634765,
      "timestamp": 565.8940261006355
    },
    {
      "distance": 1426.335537650298,
      "timestamp": 569.8828245997429
    },
    {
      "distance": 1436.840885921093,
      "timestamp": 573.9253593087196
    },
    {
      "distance": 1447.5546547733813,
      "timestamp": 577.8961175084114
    },
    {
      "distance": 1458.102286505687,
      "timestamp": 581.8830872178078
    },
    {
      "distance": 1468.9598103160754,
      "timestamp": 585.9490391612053
    },
    {
      "distance": 1479.615312782934,
      "timestamp": 589.9217162132263
    },
    {
      "distance": 1489.801924908555,
      "timestamp": 593.9150165319443
    },
    {
      "distance": 1500.27940323796,
      "timestamp": 597.8887577652931
    },
    {
      "distance": 1511.1304842251927,
      "timestamp": 601.9121835827827
    },
    {
      "distance": 1521.9380624503533,
      "timestamp": 605.9218458533287
    },
    {
      "distance": 1532.88443214165,
      "timestamp": 609.8907898664474
    },
    {
      "distance": 1543.6102952378758,
      "timestamp": 613.8966607451439
    },
    {
      "distance": 1554.112683156726,
      "timestamp": 617.9247645735741
    },
    {
      "distance": 1566.707329610017,
      "timestamp": 622.9063078165054
    },
    {
      "distance": 1576.8179350713058,
      "timestamp": 626.9208610653877
    },
    {
      "distance": 1589.3035029840553,
      "timestamp": 631.8936819434166
    },
    {
      "distance": 1599.5705353272792,
      "timestamp": 635.8902465105057
    },
    {
      "distance": 1610.2815632046745,
      "timestamp": 639.8915461301804
    },
    {
      "distance": 1620.7825895624233,
      "timestamp": 643.8986335396767
    },
    {
      "distance": 1631.4003424401224,
      "timestamp": 647.8974481225014
    },
    {
      "distance": 1641.7488593613289,
      "timestamp": 651.9170726537704
    },
    {
      "distance": 1652.156158564216,
      "timestamp": 655.8875077962875
    },
    {
      "distance": 1662.5910322792226,
      "timestamp": 659.9252818822861
    },
    {
      "distance": 1673.2690987693006,
      "timestamp": 663.9196897745132
    },
    {
      "distance": 1684.4083311424033,
      "timestamp": 667.9142824411392
    },
    {
      "distance": 1695.566129136672,
      "timestamp": 671.8922784924507
    },
    {
      "distance": 1705.860130883133,
      "timestamp": 675.9233029484749
    },
    {
      "distance": 1716.0467031691435,
      "timestamp": 679.9263295531273
    },
    {
      "distance": 1726.7247667226404,
      "timestamp": 683.9160143136978
    },
    {
      "distance": 1737.2022041366736,
      "timestamp": 687.9205718636513
    },
    {
      "distance": 1747.3796654051644,
      "timestamp": 691.9184752702713
    },
    {
      "distance": 1757.7679279769045,
      "timestamp": 695.9104213118553
    },
    {
      "distance": 1768.5778656470138,
      "timestamp": 699.8969160318375
    },
    {
      "distance": 1779.3803646257115,
      "timestamp": 703.9014522433281
    },
    {
      "distance": 1789.8827163162932,
      "timestamp": 707.9246025681496
    },
    {
      "distance": 1799.880978364475,
      "timestamp": 711.8922451734543
    },
    {
      "distance": 1811.3844174517183,
      "timestamp": 715.9078463315964
    },
    {
      "distance": 1822.868686339212,
      "timestamp": 719.8880279660225
    },
    {
      "distance": 1833.819186911183,
      "timestamp": 723.8909017443657
    },
    {
      "distance": 1844.7468479671197,
      "timestamp": 727.9167748093605
    },
    {
      "distance": 1855.2076289141937,
      "timestamp": 731.8805075883865
    },
    {
      "distance": 1865.455328757616,
      "timestamp": 735.8819470405579
    },
    {
      "distance": 1875.6000675219725,
      "timestamp": 739.8941011428833
    },
    {
      "distance": 1886.0925161417147,
      "timestamp": 743.889566898346
    },
    {
      "distance": 1896.2576227606987,
      "timestamp": 747.9148442745209
    },
    {
      "distance": 1906.4023526936096,
      "timestamp": 751.8921948075294
    },
    {
      "distance": 1918.815196917982,
      "timestamp": 756.9220214486122
    },
    {
      "distance": 1928.9630079034,
      "timestamp": 760.9260841608047
    },
    {
      "distance": 1939.6787438390375,
      "timestamp": 764.9211228489876
    },
    {
      "distance": 1950.208893179167,
      "timestamp": 768.9186433553696
    },
    {
      "distance": 1962.48967953686,
      "timestamp": 773.8951703310013
    },
    {
      "distance": 1972.897151468295,
      "timestamp": 777.8902798891068
    },
    {
      "distance": 1982.9518775390866,
      "timestamp": 781.9162853956223
    },
    {
      "distance": 1993.277004559981,
      "timestamp": 785.9141488671303
    },
    {
      "distance": 2003.733762154775,
      "timestamp": 789.9251094460487
    },
    {
      "distance": 2014.096085807593,
      "timestamp": 793.92700111866
    },
    {
      "distance": 2024.1800963097799,
      "timestamp": 797.9177783131599
    },
    {
      "distance": 2034.9582802999728,
      "timestamp": 801.9334385991096
    },
    {
      "distance": 2045.744663079337,
      "timestamp": 805.9165259599686
    },
    {
      "distance": 2056.2684474500375,
      "timestamp": 809.9219307899475
    },
    {
      "distance": 2067.0284930846233,
      "timestamp": 813.9266813993454
    },
    {
      "distance": 2077.7180816148652,
      "timestamp": 817.9223150610924
    },
    {
      "distance": 2088.509742814353,
      "timestamp": 821.877256155014
    },
    {
      "distance": 2098.8547117798607,
      "timestamp": 825.9278737306595
    },
    {
      "distance": 2109.5408155669734,
      "timestamp": 829.910017490387
    },
    {
      "distance": 2120.1158441545545,
      "timestamp": 833.9076291322708
    },
    {
      "distance": 2130.4914878207433,
      "timestamp": 837.8993787169456
    },
    {
      "distance": 2142.9739944794965,
      "timestamp": 842.9158788323402
    },
    {
      "distance": 2153.2332522148463,
      "timestamp": 846.9150732159615
    },
    {
      "distance": 2163.7142774928216,
      "timestamp": 850.8872973918915
    },
    {
      "distance": 2174.5114586186733,
      "timestamp": 854.88043653965
    },
    {
      "distance": 2185.4167604630975,
      "timestamp": 858.8890310525894
    },
    {
      "distance": 2196.7726439963994,
      "timestamp": 862.9227654337883
    },
    {
      "distance": 2207.114732465161,
      "timestamp": 866.9234962463379
    },
    {
      "distance": 2218.0154800070363,
      "timestamp": 870.8881939053535
    },
    {
      "distance": 2228.802308579092,
      "timestamp": 874.9065843224525
    },
    {
      "distance": 2239.263179155298,
      "timestamp": 878.8849962353706
    },
    {
      "distance": 2250.2723789744987,
      "timestamp": 882.8934655189514
    },
    {
      "distance": 2261.6319781871575,
      "timestamp": 886.86980509758
    },
    {
      "distance": 2272.3255131622964,
      "timestamp": 890.8883600831032
    },
    {
      "distance": 2282.374894539808,
      "timestamp": 894.9034097194672
    },
    {
      "distance": 2294.576800623057,
      "timestamp": 899.8906328678131
    },
    {
      "distance": 2304.836056661101,
      "timestamp": 903.8869354724884
    },
    {
      "distance": 2314.873572422305,
      "timestamp": 907.9127858877182
    },
    {
      "distance": 2327.502453492833,
      "timestamp": 912.8941050171852
    },
    {
      "distance": 2337.650835524525,
      "timestamp": 916.9202613830566
    },
    {
      "distance": 2347.7940788995247,
      "timestamp": 920.9302591085434
    },
    {
      "distance": 2358.032744883503,
      "timestamp": 924.8893720507622
    },
    {
      "distance": 2368.377371321823,
      "timestamp": 928.8904983997345
    },
    {
      "distance": 2378.7774727473775,
      "timestamp": 932.9024250507355
    },
    {
      "distance": 2389.03589470759,
      "timestamp": 936.9206899404526
    },
    {
      "distance": 2399.2028848829796,
      "timestamp": 940.9224004745483
    },
    {
      "distance": 2409.4989239303436,
      "timestamp": 944.9176208376884
    },
    {
      "distance": 2419.9356361759455,
      "timestamp": 948.9257856607437
    },
    {
      "distance": 2430.414128652752,
      "timestamp": 952.9031649827957
    },
    {
      "distance": 2441.071235571614,
      "timestamp": 956.8864200115204
    },
    {
      "distance": 2452.5260389361392,
      "timestamp": 961.9323435425758
    },
    {
      "distance": 2463.9869168585433,
      "timestamp": 966.9434335827827
    },
    {
      "distance": 2476.493124044292,
      "timestamp": 972.9112115502357
    },
    {
      "distance": 2487.117177273876,
      "timestamp": 976.8871597647667
    },
    {
      "distance": 2497.30395102328,
      "timestamp": 980.8973392248154
    },
    {
      "distance": 2508.1117854753084,
      "timestamp": 984.9005773663521
    },
    {
      "distance": 2518.382711547798,
      "timestamp": 988.8878368139267
    },
    {
      "distance": 2528.8393807107395,
      "timestamp": 992.8868998289108
    },
    {
      "distance": 2539.4870743790143,
      "timestamp": 996.888590335846
    },
    {
      "distance": 2550.527601009244,
      "timestamp": 1000.890759944916
    },
    {
      "distance": 2561.483484876481,
      "timestamp": 1004.919565737247
    },
    {
      "distance": 2572.024562714539,
      "timestamp": 1008.92548251152
    },
    {
      "distance": 2583.015654721886,
      "timestamp": 1012.908185303211
    },
    {
      "distance": 2593.5223567463295,
      "timestamp": 1016.896570086479
    },
    {
      "distance": 2604.222370285488,
      "timestamp": 1020.940825164318
    },
    {
      "distance": 2614.5987620494616,
      "timestamp": 1024.917754113674
    },
    {
      "distance": 2626.967070306688,
      "timestamp": 1029.902387797832
    },
    {
      "distance": 2639.1423201554085,
      "timestamp": 1034.910328149796
    },
    {
      "distance": 2649.250901437292,
      "timestamp": 1038.903324723244
    },
    {
      "distance": 2659.9742484315884,
      "timestamp": 1042.8987488746639
    },
    {
      "distance": 2672.3948226776847,
      "timestamp": 1047.888528048992
    },
    {
      "distance": 2682.791661881004,
      "timestamp": 1051.930832803249
    },
    {
      "distance": 2693.587509999069,
      "timestamp": 1055.925020933151
    },
    {
      "distance": 2704.0914208770455,
      "timestamp": 1059.924300789833
    },
    {
      "distance": 2715.4018701980285,
      "timestamp": 1063.93158197403
    },
    {
      "distance": 2726.239020776812,
      "timestamp": 1067.928113281727
    },
    {
      "distance": 2736.5929724917646,
      "timestamp": 1071.923871397972
    },
    {
      "distance": 2747.5075468098403,
      "timestamp": 1075.921162128448
    },
    {
      "distance": 2758.1950140803706,
      "timestamp": 1079.890880644321
    },
    {
      "distance": 2768.9989005062844,
      "timestamp": 1083.895773530006
    },
    {
      "distance": 2779.648540707471,
      "timestamp": 1087.940228044987
    },
    {
      "distance": 2790.1071258605157,
      "timestamp": 1091.9246422052381
    },
    {
      "distance": 2800.676486988374,
      "timestamp": 1095.9313148260119
    },
    {
      "distance": 2811.37627026763,
      "timestamp": 1102.932431221008
    },
    {
      "distance": 2821.968831443151,
      "timestamp": 1108.931016325951
    },
    {
      "distance": 2833.206606970322,
      "timestamp": 1112.945829391479
    },
    {
      "distance": 2843.557050762213,
      "timestamp": 1116.935740172863
    },
    {
      "distance": 2853.90884200731,
      "timestamp": 1120.910886645317
    },
    {
      "distance": 2865.602886666437,
      "timestamp": 1124.897574961185
    },
    {
      "distance": 2876.69043181322,
      "timestamp": 1128.920484423637
    },
    {
      "distance": 2887.5490865935244,
      "timestamp": 1132.918877542019
    },
    {
      "distance": 2898.5547612133623,
      "timestamp": 1136.8957067132
    },
    {
      "distance": 2909.288337471254,
      "timestamp": 1140.919206500053
    },
    {
      "distance": 2919.3260514513872,
      "timestamp": 1144.916153967381
    },
    {
      "distance": 2929.8287117617533,
      "timestamp": 1148.92257630825
    },
    {
      "distance": 2940.662602158367,
      "timestamp": 1152.901358902454
    },
    {
      "distance": 2951.7406007671757,
      "timestamp": 1156.923207044601
    },
    {
      "distance": 2962.337125145698,
      "timestamp": 1160.919946491718
    },
    {
      "distance": 2972.703504669166,
      "timestamp": 1164.874756336212
    },
    {
      "distance": 2983.3325448527253,
      "timestamp": 1168.888486981392
    },
    {
      "distance": 2993.7326212194102,
      "timestamp": 1172.911113202572
    },
    {
      "distance": 3004.3396939821337,
      "timestamp": 1176.917804479599
    },
    {
      "distance": 3014.9352763673205,
      "timestamp": 1180.925709486008
    },
    {
      "distance": 3026.061132986396,
      "timestamp": 1184.919108867645
    },
    {
      "distance": 3037.411996151519,
      "timestamp": 1188.919276058674
    },
    {
      "distance": 3048.466513702433,
      "timestamp": 1192.895651876926
    },
    {
      "distance": 3059.207955775255,
      "timestamp": 1196.892715096474
    },
    {
      "distance": 3069.590798592308,
      "timestamp": 1200.892406225204
    },
    {
      "distance": 3080.2256431375617,
      "timestamp": 1204.919062376022
    },
    {
      "distance": 3092.768985251972,
      "timestamp": 1209.888006269932
    },
    {
      "distance": 3105.0826889277077,
      "timestamp": 1214.891687452793
    },
    {
      "distance": 3115.086969680377,
      "timestamp": 1218.895959913731
    },
    {
      "distance": 3126.2665496850113,
      "timestamp": 1222.879868865013
    },
    {
      "distance": 3137.201005765297,
      "timestamp": 1226.902442455292
    },
    {
      "distance": 3147.769795918196,
      "timestamp": 1230.910497546196
    },
    {
      "distance": 3158.5639773311796,
      "timestamp": 1234.920969605446
    },
    {
      "distance": 3169.235338555267,
      "timestamp": 1238.921620845795
    },
    {
      "distance": 3179.9792268478936,
      "timestamp": 1242.890902221203
    },
    {
      "distance": 3190.7178325365508,
      "timestamp": 1246.892236292362
    },
    {
      "distance": 3201.166330643431,
      "timestamp": 1250.899865090847
    },
    {
      "distance": 3212.0921219021525,
      "timestamp": 1254.88707780838
    },
    {
      "distance": 3222.6989371884238,
      "timestamp": 1258.920699834824
    },
    {
      "distance": 3233.4791821223057,
      "timestamp": 1262.920493483543
    },
    {
      "distance": 3244.3067909892266,
      "timestamp": 1266.914494991302
    },
    {
      "distance": 3255.281283029547,
      "timestamp": 1270.937974333763
    },
    {
      "distance": 3266.124258633817,
      "timestamp": 1274.922912597656
    },
    {
      "distance": 3276.8477777404937,
      "timestamp": 1278.914714097977
    },
    {
      "distance": 3287.2195361446593,
      "timestamp": 1282.879028379917
    },
    {
      "distance": 3297.4888541224914,
      "timestamp": 1286.8931998610499
    },
    {
      "distance": 3307.75366245782,
      "timestamp": 1290.915308594704
    },
    {
      "distance": 3317.951557322738,
      "timestamp": 1294.885758817196
    },
    {
      "distance": 3330.02303177578,
      "timestamp": 1299.893720507622
    },
    {
      "distance": 3342.2224667076093,
      "timestamp": 1304.91407930851
    },
    {
      "distance": 3353.6001141875945,
      "timestamp": 1308.945923089981
    },
    {
      "distance": 3364.206327274105,
      "timestamp": 1312.904597043991
    },
    {
      "distance": 3374.826744693113,
      "timestamp": 1316.905579328537
    },
    {
      "distance": 3385.3156907635334,
      "timestamp": 1320.893459975719
    },
    {
      "distance": 3395.964940739198,
      "timestamp": 1324.900768756866
    },
    {
      "distance": 3406.2517990964016,
      "timestamp": 1328.920089125633
    },
    {
      "distance": 3418.7503672691573,
      "timestamp": 1333.893104851246
    },
    {
      "distance": 3428.9424591338334,
      "timestamp": 1337.891545474529
    },
    {
      "distance": 3439.115063024319,
      "timestamp": 1341.899197340012
    },
    {
      "distance": 3449.77951866742,
      "timestamp": 1345.886246085167
    },
    {
      "distance": 3460.0714193038143,
      "timestamp": 1349.895648598671
    },
    {
      "distance": 3470.20837192629,
      "timestamp": 1353.881751477718
    },
    {
      "distance": 3480.27194305525,
      "timestamp": 1357.884127557278
    },
    {
      "distance": 3490.593496701995,
      "timestamp": 1361.891215085983
    },
    {
      "distance": 3503.0121048598685,
      "timestamp": 1366.92406898737
    },
    {
      "distance": 3513.204138630749,
      "timestamp": 1370.909236490726
    },
    {
      "distance": 3524.1878116614143,
      "timestamp": 1374.916836678982
    },
    {
      "distance": 3534.668185622391,
      "timestamp": 1378.889989733696
    },
    {
      "distance": 3545.3613419458898,
      "timestamp": 1382.918338656425
    },
    {
      "distance": 3555.8600698328723,
      "timestamp": 1386.923959732056
    },
    {
      "distance": 3566.3065610343847,
      "timestamp": 1390.891817808151
    },
    {
      "distance": 3576.5218641476104,
      "timestamp": 1394.918452501297
    },
    {
      "distance": 3586.7293099654257,
      "timestamp": 1398.926974952221
    },
    {
      "distance": 3597.175778622985,
      "timestamp": 1402.903422772884
    },
    {
      "distance": 3607.925568532457,
      "timestamp": 1406.891825973988
    },
    {
      "distance": 3618.192938811445,
      "timestamp": 1410.919786632061
    },
    {
      "distance": 3629.355844346189,
      "timestamp": 1414.921706914902
    },
    {
      "distance": 3640.4248259297033,
      "timestamp": 1418.890853583813
    },
    {
      "distance": 3651.046781326942,
      "timestamp": 1422.883132517338
    },
    {
      "distance": 3661.753419493701,
      "timestamp": 1426.908781647682
    },
    {
      "distance": 3672.5057732471673,
      "timestamp": 1430.927483201027
    },
    {
      "distance": 3682.656583334688,
      "timestamp": 1434.891165435314
    },
    {
      "distance": 3692.8073858416424,
      "timestamp": 1438.889725863934
    },
    {
      "distance": 3702.983096189286,
      "timestamp": 1442.898270308971
    },
    {
      "distance": 3713.034517646151,
      "timestamp": 1446.885938346386
    },
    {
      "distance": 3725.3587975196106,
      "timestamp": 1451.908323407173
    },
    {
      "distance": 3737.6070350319287,
      "timestamp": 1456.893562495708
    },
    {
      "distance": 3747.868430617763,
      "timestamp": 1460.891140401363
    },
    {
      "distance": 3758.4345708817827,
      "timestamp": 1464.925799965858
    },
    {
      "distance": 3768.9040266306133,
      "timestamp": 1468.923430919647
    },
    {
      "distance": 3780.6914499377117,
      "timestamp": 1473.901125013828
    },
    {
      "distance": 3792.014414910602,
      "timestamp": 1479.9058598876
    },
    {
      "distance": 3802.7868010814163,
      "timestamp": 1483.902597010136
    },
    {
      "distance": 3813.445141957689,
      "timestamp": 1487.922692418098
    },
    {
      "distance": 3824.9473464843245,
      "timestamp": 1491.929240643978
    },
    {
      "distance": 3836.1428901771396,
      "timestamp": 1495.926039397717
    },
    {
      "distance": 3846.685094213421,
      "timestamp": 1499.927619576454
    },
    {
      "distance": 3859.198445127234,
      "timestamp": 1504.924838006496
    },
    {
      "distance": 3869.67769630788,
      "timestamp": 1508.891583800316
    },
    {
      "distance": 3881.996545898136,
      "timestamp": 1513.882405221462
    },
    {
      "distance": 3893.9627565541696,
      "timestamp": 1518.922646284103
    },
    {
      "distance": 3904.0200092454465,
      "timestamp": 1522.904565989971
    },
    {
      "distance": 3914.316918821175,
      "timestamp": 1526.892728686333
    },
    {
      "distance": 3926.3378406986544,
      "timestamp": 1531.935112893581
    },
    {
      "distance": 3936.576006614999,
      "timestamp": 1535.919998764992
    },
    {
      "distance": 3946.7019673429436,
      "timestamp": 1539.890627980232
    },
    {
      "distance": 3957.1916753117307,
      "timestamp": 1543.917166113853
    },
    {
      "distance": 3968.3201503044165,
      "timestamp": 1547.928189814091
    },
    {
      "distance": 3978.3215844121737,
      "timestamp": 1551.907247841358
    },
    {
      "distance": 3990.82170532695,
      "timestamp": 1556.927769720554
    },
    {
      "distance": 4001.0662842940073,
      "timestamp": 1560.926428258419
    },
    {
      "distance": 4013.4531102136248,
      "timestamp": 1565.919342398643
    },
    {
      "distance": 4025.737396516872,
      "timestamp": 1570.922997117043
    },
    {
      "distance": 4035.7672841838566,
      "timestamp": 1574.877024769783
    },
    {
      "distance": 4045.9643782498233,
      "timestamp": 1578.918944239616
    },
    {
      "distance": 4056.392563542132,
      "timestamp": 1582.899214148521
    },
    {
      "distance": 4066.6878496900226,
      "timestamp": 1586.889399528503
    },
    {
      "distance": 4077.044201369174,
      "timestamp": 1590.919196784496
    },
    {
      "distance": 4089.3405706604076,
      "timestamp": 1595.890011608601
    },
    {
      "distance": 4101.94588428839,
      "timestamp": 1600.895663559437
    },
    {
      "distance": 4114.338386758213,
      "timestamp": 1605.884543895721
    },
    {
      "distance": 4126.555505489802,
      "timestamp": 1610.885698497295
    },
    {
      "distance": 4137.16555158052,
      "timestamp": 1614.919607996941
    },
    {
      "distance": 4147.293406668416,
      "timestamp": 1618.901965081692
    },
    {
      "distance": 4157.323211957476,
      "timestamp": 1622.910733163357
    },
    {
      "distance": 4167.49186824827,
      "timestamp": 1626.913492679596
    },
    {
      "distance": 4180.126610701102,
      "timestamp": 1631.924681842327
    },
    {
      "distance": 4190.707197163492,
      "timestamp": 1635.892295181751
    },
    {
      "distance": 4201.869111382587,
      "timestamp": 1639.919776856899
    },
    {
      "distance": 4212.923160277913,
      "timestamp": 1643.944698810577
    },
    {
      "distance": 4223.578194127911,
      "timestamp": 1647.893558502197
    },
    {
      "distance": 4234.157279412703,
      "timestamp": 1651.900757730007
    },
    {
      "distance": 4244.40540667386,
      "timestamp": 1655.941224575043
    },
    {
      "distance": 4254.831999774744,
      "timestamp": 1659.889593720436
    },
    {
      "distance": 4264.894153487706,
      "timestamp": 1663.922271311283
    },
    {
      "distance": 4275.390536630261,
      "timestamp": 1667.921068549156
    },
    {
      "distance": 4285.623262875826,
      "timestamp": 1671.917457580566
    },
    {
      "distance": 4296.160193373602,
      "timestamp": 1675.888138830662
    },
    {
      "distance": 4306.7490658144425,
      "timestamp": 1679.907979667187
    },
    {
      "distance": 4318.16169690681,
      "timestamp": 1684.92837035656
    },
    {
      "distance": 4330.442081553177,
      "timestamp": 1689.925935387611
    },
    {
      "distance": 4340.558524212135,
      "timestamp": 1693.928976714611
    },
    {
      "distance": 4352.5805162584875,
      "timestamp": 1698.923368394375
    },
    {
      "distance": 4364.535650195572,
      "timestamp": 1703.89059227705
    },
    {
      "distance": 4375.780982519851,
      "timestamp": 1708.911204338074
    },
    {
      "distance": 4388.077140709577,
      "timestamp": 1713.92231631279
    },
    {
      "distance": 4398.352016465237,
      "timestamp": 1717.919975578785
    },
    {
      "distance": 4409.133806167938,
      "timestamp": 1721.891782104969
    },
    {
      "distance": 4419.610264565623,
      "timestamp": 1725.8972150087359
    },
    {
      "distance": 4430.120299044555,
      "timestamp": 1729.911449730396
    },
    {
      "distance": 4440.227391643703,
      "timestamp": 1733.924409329891
    },
    {
      "distance": 4450.816185834661,
      "timestamp": 1737.922340869904
    },
    {
      "distance": 4463.183711231472,
      "timestamp": 1742.924727797508
    },
    {
      "distance": 4473.394843539953,
      "timestamp": 1746.933353185654
    },
    {
      "distance": 4483.569197167126,
      "timestamp": 1750.901147425175
    },
    {
      "distance": 4493.878258431883,
      "timestamp": 1754.928895175457
    },
    {
      "distance": 4504.259026175324,
      "timestamp": 1758.920034408569
    },
    {
      "distance": 4514.470135735521,
      "timestamp": 1762.919461786747
    },
    {
      "distance": 4525.0588866307935,
      "timestamp": 1766.896259129047
    },
    {
      "distance": 4535.808800603556,
      "timestamp": 1770.887704968452
    },
    {
      "distance": 4546.3858347221485,
      "timestamp": 1774.901829600334
    },
    {
      "distance": 4556.895794518902,
      "timestamp": 1778.893050372601
    },
    {
      "distance": 4567.023410868785,
      "timestamp": 1782.889064192772
    },
    {
      "distance": 4577.301195866306,
      "timestamp": 1786.919798195362
    },
    {
      "distance": 4587.643115899681,
      "timestamp": 1790.91950327158
    },
    {
      "distance": 4597.796904545102,
      "timestamp": 1794.901526629925
    },
    {
      "distance": 4608.030739884947,
      "timestamp": 1798.897496521473
    },
    {
      "distance": 4618.674302785291,
      "timestamp": 1802.896875619888
    },
    {
      "distance": 4629.03917657527,
      "timestamp": 1806.892506837845
    },
    {
      "distance": 4639.552316193401,
      "timestamp": 1810.921340823174
    },
    {
      "distance": 4650.000346170573,
      "timestamp": 1814.909863114357
    },
    {
      "distance": 4660.391034697901,
      "timestamp": 1818.902191579342
    },
    {
      "distance": 4672.099240485563,
      "timestamp": 1822.903841078281
    },
    {
      "distance": 4682.947583081965,
      "timestamp": 1826.895632147789
    },
    {
      "distance": 4693.309235506846,
      "timestamp": 1830.921852767467
    },
    {
      "distance": 4704.079473132419,
      "timestamp": 1834.926471054554
    },
    {
      "distance": 4714.421427104173,
      "timestamp": 1838.888351738453
    },
    {
      "distance": 4726.444294281005,
      "timestamp": 1842.900708854198
    },
    {
      "distance": 4738.693362649423,
      "timestamp": 1847.892800688744
    },
    {
      "distance": 4750.157767691453,
      "timestamp": 1852.93247127533
    },
    {
      "distance": 4760.339268921453,
      "timestamp": 1856.926319420338
    },
    {
      "distance": 4770.354381894976,
      "timestamp": 1860.917481839657
    },
    {
      "distance": 4780.710323710642,
      "timestamp": 1864.9264960289
    },
    {
      "distance": 4791.304960064175,
      "timestamp": 1868.888615965843
    },
    {
      "distance": 4801.501631659329,
      "timestamp": 1872.891010463238
    },
    {
      "distance": 4811.636548303376,
      "timestamp": 1876.928806364536
    },
    {
      "distance": 4821.868958205397,
      "timestamp": 1880.930052518845
    },
    {
      "distance": 4832.5431419190345,
      "timestamp": 1884.915949225426
    },
    {
      "distance": 4843.209581818605,
      "timestamp": 1888.897372245789
    },
    {
      "distance": 4853.96675197377,
      "timestamp": 1892.925562679768
    },
    {
      "distance": 4864.547928830861,
      "timestamp": 1896.92419308424
    },
    {
      "distance": 4874.714480536177,
      "timestamp": 1900.892771720886
    },
    {
      "distance": 4885.335790268566,
      "timestamp": 1904.920838832855
    },
    {
      "distance": 4895.834214280464,
      "timestamp": 1908.936635613441
    },
    {
      "distance": 4908.212949204091,
      "timestamp": 1913.896061837673
    },
    {
      "distance": 4920.319686746338,
      "timestamp": 1918.895281970501
    },
    {
      "distance": 4932.364572195944,
      "timestamp": 1923.892295360565
    },
    {
      "distance": 4944.834037907282,
      "timestamp": 1928.89109402895
    },
    {
      "distance": 4954.900512478516,
      "timestamp": 1932.896072208881
    },
    {
      "distance": 4967.422894414749,
      "timestamp": 1937.893539011478
    },
    {
      "distance": 4977.666904550659,
      "timestamp": 1941.896839797497
    },
    {
      "distance": 4988.687968522767,
      "timestamp": 1945.884829521179
    },
    {
      "distance": 4999.362026376909,
      "timestamp": 1949.899328231812
    },
    {
      "distance": 5010.139049976687,
      "timestamp": 1953.886784851551
    },
    {
      "distance": 5021.8618213563595,
      "timestamp": 1957.902753591537
    },
    {
      "distance": 5032.994054391642,
      "timestamp": 1961.919840157032
    },
    {
      "distance": 5044.115482833452,
      "timestamp": 1965.897062838078
    },
    {
      "distance": 5054.684730473718,
      "timestamp": 1969.897639036179
    },
    {
      "distance": 5065.351003111406,
      "timestamp": 1973.913675606251
    },
    {
      "distance": 5075.467036410357,
      "timestamp": 1977.9233314991
    },
    {
      "distance": 5085.583062207438,
      "timestamp": 1981.919827461243
    },
    {
      "distance": 5097.8440032225135,
      "timestamp": 1986.916871011257
    },
    {
      "distance": 5109.74725299233,
      "timestamp": 1991.887444913387
    },
    {
      "distance": 5121.47332208668,
      "timestamp": 1996.933092832565
    },
    {
      "distance": 5132.901426388434,
      "timestamp": 2001.925038695335
    },
    {
      "distance": 5145.028368362606,
      "timestamp": 2006.902372658253
    },
    {
      "distance": 5157.172444301081,
      "timestamp": 2011.923966944218
    },
    {
      "distance": 5169.378702192628,
      "timestamp": 2016.920776486397
    },
    {
      "distance": 5179.862304775117,
      "timestamp": 2020.887184202671
    },
    {
      "distance": 5190.4550677395555,
      "timestamp": 2024.916088044643
    },
    {
      "distance": 5201.291613498422,
      "timestamp": 2028.912507236004
    },
    {
      "distance": 5212.4282947033535,
      "timestamp": 2032.900577068329
    },
    {
      "distance": 5223.564966759553,
      "timestamp": 2036.886105537415
    },
    {
      "distance": 5234.224986448968,
      "timestamp": 2040.889725506306
    },
    {
      "distance": 5244.817624121072,
      "timestamp": 2044.886184811592
    },
    {
      "distance": 5255.295238253963,
      "timestamp": 2048.890691459179
    },
    {
      "distance": 5265.368183416692,
      "timestamp": 2052.889363408089
    },
    {
      "distance": 5276.139094155198,
      "timestamp": 2056.9133066535
    },
    {
      "distance": 5287.148210413367,
      "timestamp": 2060.91937571764
    },
    {
      "distance": 5298.099325605848,
      "timestamp": 2064.8937693238263
    },
    {
      "distance": 5308.694326011535,
      "timestamp": 2068.888647377491
    },
    {
      "distance": 5318.8906042393655,
      "timestamp": 2072.892243802547
    },
    {
      "distance": 5329.906114349396,
      "timestamp": 2076.8911681175227
    },
    {
      "distance": 5340.859142652085,
      "timestamp": 2080.9015756249432
    },
    {
      "distance": 5351.9866985294775,
      "timestamp": 2084.892736911774
    },
    {
      "distance": 5362.34102694583,
      "timestamp": 2088.893942177296
    },
    {
      "distance": 5373.349320778496,
      "timestamp": 2092.894351124763
    },
    {
      "distance": 5384.3584268037275,
      "timestamp": 2096.882045686245
    },
    {
      "distance": 5395.225997455243,
      "timestamp": 2100.919373214245
    },
    {
      "distance": 5407.009127690975,
      "timestamp": 2104.901613116264
    },
    {
      "distance": 5418.4440736129,
      "timestamp": 2108.918253064156
    },
    {
      "distance": 5429.755346177651,
      "timestamp": 2112.88045156002
    },
    {
      "distance": 5440.614965588069,
      "timestamp": 2116.924397110939
    },
    {
      "distance": 5451.599048007909,
      "timestamp": 2120.917741537094
    },
    {
      "distance": 5461.991645953108,
      "timestamp": 2124.898984670639
    },
    {
      "distance": 5472.861795211349,
      "timestamp": 2128.893369793892
    },
    {
      "distance": 5483.8251672097,
      "timestamp": 2132.912179768085
    },
    {
      "distance": 5494.883887145064,
      "timestamp": 2136.925755560398
    },
    {
      "distance": 5505.178196221185,
      "timestamp": 2140.924966096878
    },
    {
      "distance": 5515.595042823387,
      "timestamp": 2144.919701755047
    },
    {
      "distance": 5525.9486877229165,
      "timestamp": 2148.92262160778
    },
    {
      "distance": 5536.42342477955,
      "timestamp": 2152.915518820286
    },
    {
      "distance": 5547.1342166355935,
      "timestamp": 2156.900897026062
    },
    {
      "distance": 5558.118206626163,
      "timestamp": 2161.921188771725
    },
    {
      "distance": 5569.459233694539,
      "timestamp": 2168.922458827496
    },
    {
      "distance": 5579.805223890742,
      "timestamp": 2238.878344774246
    },
    {
      "distance": 5589.960635838445,
      "timestamp": 2290.896037697792
    },
    {
      "distance": 5601.349718454625,
      "timestamp": 2299.894375026226
    },
    {
      "distance": 5613.712968262768,
      "timestamp": 2304.890914022923
    },
    {
      "distance": 5624.3118189475645,
      "timestamp": 2308.918181598186
    },
    {
      "distance": 5634.494425205194,
      "timestamp": 2312.913888275623
    },
    {
      "distance": 5644.738006001373,
      "timestamp": 2316.908087849617
    },
    {
      "distance": 5655.258319732942,
      "timestamp": 2320.893743574619
    },
    {
      "distance": 5665.790862307652,
      "timestamp": 2324.892386436462
    },
    {
      "distance": 5676.837300212985,
      "timestamp": 2328.876682698727
    },
    {
      "distance": 5689.037641082769,
      "timestamp": 2333.898149847984
    },
    {
      "distance": 5701.614394500621,
      "timestamp": 2338.89308488369
    },
    {
      "distance": 5712.669719645018,
      "timestamp": 2342.919181108475
    },
    {
      "distance": 5722.785791606567,
      "timestamp": 2346.928494572639
    },
    {
      "distance": 5734.926393716523,
      "timestamp": 2351.889700889587
    },
    {
      "distance": 5746.741198944552,
      "timestamp": 2356.900125145912
    },
    {
      "distance": 5759.179733900296,
      "timestamp": 2361.899728894234
    },
    {
      "distance": 5769.354955904596,
      "timestamp": 2365.886235415936
    },
    {
      "distance": 5781.576427584517,
      "timestamp": 2370.88161867857
    },
    {
      "distance": 5793.776878028527,
      "timestamp": 2375.900686562061
    },
    {
      "distance": 5805.979010295303,
      "timestamp": 2380.889926493168
    },
    {
      "distance": 5816.041093663244,
      "timestamp": 2384.917076230049
    },
    {
      "distance": 5826.15833751485,
      "timestamp": 2388.925967514515
    },
    {
      "distance": 5838.297383756439,
      "timestamp": 2393.890475988388
    },
    {
      "distance": 5850.734756428625,
      "timestamp": 2398.886454045773
    },
    {
      "distance": 5860.913348147081,
      "timestamp": 2402.890943467617
    },
    {
      "distance": 5871.209656083012,
      "timestamp": 2406.892722308636
    },
    {
      "distance": 5881.624013733792,
      "timestamp": 2410.908569872379
    },
    {
      "distance": 5892.286728638337,
      "timestamp": 2414.892112255096
    },
    {
      "distance": 5903.355043228873,
      "timestamp": 2418.88504332304
    },
    {
      "distance": 5914.006854764081,
      "timestamp": 2422.8907399773598
    },
    {
      "distance": 5924.301449101584,
      "timestamp": 2426.889937102795
    },
    {
      "distance": 5936.916844419398,
      "timestamp": 2431.891259372234
    },
    {
      "distance": 5949.234433494107,
      "timestamp": 2436.912626743317
    },
    {
      "distance": 5959.596718359833,
      "timestamp": 2440.915298819542
    },
    {
      "distance": 5970.010759700868,
      "timestamp": 2444.936233699322
    },
    {
      "distance": 5980.662623129292,
      "timestamp": 2448.922052681446
    },
    {
      "distance": 5991.137646652596,
      "timestamp": 2452.900231003761
    },
    {
      "distance": 6001.355022357718,
      "timestamp": 2456.918475329876
    },
    {
      "distance": 6013.676273671392,
      "timestamp": 2461.914364397526
    },
    {
      "distance": 6024.097783456662,
      "timestamp": 2465.894702017307
    },
    {
      "distance": 6034.337020264924,
      "timestamp": 2469.8836541175842
    },
    {
      "distance": 6046.892892091768,
      "timestamp": 2474.929720282555
    },
    {
      "distance": 6056.91049569613,
      "timestamp": 2478.925817430019
    },
    {
      "distance": 6069.231798196688,
      "timestamp": 2483.883401751518
    },
    {
      "distance": 6079.659363310316,
      "timestamp": 2487.8881330490112
    },
    {
      "distance": 6090.38055529814,
      "timestamp": 2491.89282566309
    },
    {
      "distance": 6101.509992711159,
      "timestamp": 2495.89258146286
    },
    {
      "distance": 6111.8047292362135,
      "timestamp": 2499.884670376778
    },
    {
      "distance": 6122.125059708579,
      "timestamp": 2503.918229937553
    },
    {
      "distance": 6132.780759540874,
      "timestamp": 2507.920765936375
    },
    {
      "distance": 6143.434758608499,
      "timestamp": 2511.903276324272
    },
    {
      "distance": 6153.492938638162,
      "timestamp": 2515.887062430382
    },
    {
      "distance": 6163.611378381825,
      "timestamp": 2519.902082264423
    },
    {
      "distance": 6176.168544282781,
      "timestamp": 2524.920518994331
    },
    {
      "distance": 6188.489953213856,
      "timestamp": 2529.892596065998
    },
    {
      "distance": 6201.004539848609,
      "timestamp": 2534.895526885986
    },
    {
      "distance": 6213.164758586819,
      "timestamp": 2539.889011144638
    },
    {
      "distance": 6223.3613404998905,
      "timestamp": 2543.886962473392
    },
    {
      "distance": 6233.5378017290295,
      "timestamp": 2547.884338915348
    },
    {
      "distance": 6244.133261936508,
      "timestamp": 2551.888214826584
    },
    {
      "distance": 6254.391727518246,
      "timestamp": 2555.886719882488
    },
    {
      "distance": 6264.748638151716,
      "timestamp": 2559.889789164066
    },
    {
      "distance": 6277.373465009976,
      "timestamp": 2564.918040454388
    },
    {
      "distance": 6287.74447166384,
      "timestamp": 2568.91397947073
    },
    {
      "distance": 6297.911041029173,
      "timestamp": 2572.924635827541
    },
    {
      "distance": 6308.345741400332,
      "timestamp": 2576.887848854065
    },
    {
      "distance": 6318.642384494764,
      "timestamp": 2580.911256432533
    },
    {
      "distance": 6331.127536006516,
      "timestamp": 2585.891574978828
    },
    {
      "distance": 6343.4405897364595,
      "timestamp": 2590.879919588566
    },
    {
      "distance": 6353.547445830453,
      "timestamp": 2594.880304038525
    },
    {
      "distance": 6363.825091557018,
      "timestamp": 2598.892726182938
    },
    {
      "distance": 6374.0850729844915,
      "timestamp": 2602.876714468002
    },
    {
      "distance": 6386.603813777907,
      "timestamp": 2607.91267311573
    },
    {
      "distance": 6399.074571392996,
      "timestamp": 2612.886756360531
    },
    {
      "distance": 6409.307035786758,
      "timestamp": 2616.899264335632
    },
    {
      "distance": 6419.741811332112,
      "timestamp": 2620.899353384972
    },
    {
      "distance": 6429.985820319702,
      "timestamp": 2624.935624659061
    },
    {
      "distance": 6440.676178570934,
      "timestamp": 2628.919610440731
    },
    {
      "distance": 6450.713873323022,
      "timestamp": 2632.918439745903
    },
    {
      "distance": 6461.096522392215,
      "timestamp": 2636.882949590683
    },
    {
      "distance": 6473.60222228882,
      "timestamp": 2641.918925464153
    },
    {
      "distance": 6483.798480343413,
      "timestamp": 2645.884328484535
    },
    {
      "distance": 6494.311606357189,
      "timestamp": 2649.872963249683
    },
    {
      "distance": 6505.045005543249,
      "timestamp": 2653.876117527485
    },
    {
      "distance": 6515.600984957965,
      "timestamp": 2657.889051735401
    },
    {
      "distance": 6526.53161661172,
      "timestamp": 2661.858619689941
    },
    {
      "distance": 6537.022772695854,
      "timestamp": 2665.892090857029
    },
    {
      "distance": 6547.6226059936025,
      "timestamp": 2669.927721440792
    },
    {
      "distance": 6558.11880786022,
      "timestamp": 2673.911604404449
    },
    {
      "distance": 6568.377855404018,
      "timestamp": 2677.916362762451
    },
    {
      "distance": 6578.796033472201,
      "timestamp": 2681.934957623482
    },
    {
      "distance": 6589.75098997506,
      "timestamp": 2685.920740067959
    },
    {
      "distance": 6601.886224241941,
      "timestamp": 2690.911586821079
    },
    {
      "distance": 6614.11290964852,
      "timestamp": 2695.89378464222
    },
    {
      "distance": 6624.523976469369,
      "timestamp": 2699.887531638145
    },
    {
      "distance": 6634.798783999965,
      "timestamp": 2703.882804870605
    },
    {
      "distance": 6645.3355985097705,
      "timestamp": 2707.879243850708
    },
    {
      "distance": 6655.463253305327,
      "timestamp": 2711.881614387035
    },
    {
      "distance": 6667.82318612616,
      "timestamp": 2716.914191305637
    },
    {
      "distance": 6679.880532700595,
      "timestamp": 2721.907841980457
    },
    {
      "distance": 6690.128536943812,
      "timestamp": 2725.887449145317
    },
    {
      "distance": 6702.049769407508,
      "timestamp": 2730.893969416618
    },
    {
      "distance": 6713.538111164918,
      "timestamp": 2735.898156881332
    },
    {
      "distance": 6725.022163759259,
      "timestamp": 2740.919428229332
    },
    {
      "distance": 6737.580332687963,
      "timestamp": 2745.925935149193
    },
    {
      "distance": 6749.954025443934,
      "timestamp": 2750.922334432602
    },
    {
      "distance": 6760.667730984571,
      "timestamp": 2754.901355445385
    },
    {
      "distance": 6771.65266920074,
      "timestamp": 2758.917062342167
    },
    {
      "distance": 6782.572587054257,
      "timestamp": 2762.893361508846
    },
    {
      "distance": 6794.056680587399,
      "timestamp": 2766.907535493374
    },
    {
      "distance": 6804.7680978597655,
      "timestamp": 2770.897301018238
    },
    {
      "distance": 6815.461865206146,
      "timestamp": 2774.89790892601
    },
    {
      "distance": 6825.842731190945,
      "timestamp": 2778.900330305099
    },
    {
      "distance": 6838.202776737454,
      "timestamp": 2783.882971227169
    },
    {
      "distance": 6848.309943587177,
      "timestamp": 2787.888532698154
    },
    {
      "distance": 6858.584877821234,
      "timestamp": 2791.891829431057
    },
    {
      "distance": 6869.252870743377,
      "timestamp": 2795.891894221306
    },
    {
      "distance": 6879.671218693745,
      "timestamp": 2799.939642906189
    },
    {
      "distance": 6890.511096023159,
      "timestamp": 2803.943887352943
    },
    {
      "distance": 6901.482035745912,
      "timestamp": 2807.938473463058
    },
    {
      "distance": 6912.690352014356,
      "timestamp": 2811.907082974911
    },
    {
      "distance": 6923.679327742573,
      "timestamp": 2815.922536671162
    },
    {
      "distance": 6934.365438271169,
      "timestamp": 2819.910807728767
    },
    {
      "distance": 6945.597031565374,
      "timestamp": 2823.92461258173
    },
    {
      "distance": 6956.530699597325,
      "timestamp": 2827.919471859932
    },
    {
      "distance": 6967.260135642712,
      "timestamp": 2831.916964590549
    },
    {
      "distance": 6977.8417235525885,
      "timestamp": 2835.91869789362
    },
    {
      "distance": 6988.422331406112,
      "timestamp": 2839.91676735878
    },
    {
      "distance": 6998.746564764634,
      "timestamp": 2843.895703971386
    },
    {
      "distance": 7009.391483427532,
      "timestamp": 2847.917173504829
    },
    {
      "distance": 7019.95423456619,
      "timestamp": 2851.905690073967
    },
    {
      "distance": 7030.486081224771,
      "timestamp": 2855.925684154034
    },
    {
      "distance": 7041.170043253943,
      "timestamp": 2859.92223751545
    },
    {
      "distance": 7051.9163063507995,
      "timestamp": 2863.922747373581
    },
    {
      "distance": 7062.652811405838,
      "timestamp": 2867.9284106493
    },
    {
      "distance": 7073.90090081195,
      "timestamp": 2871.922420322895
    },
    {
      "distance": 7084.399846130223,
      "timestamp": 2875.912017822266
    },
    {
      "distance": 7094.693009447431,
      "timestamp": 2879.913192093372
    },
    {
      "distance": 7106.508840099518,
      "timestamp": 2884.906753778458
    },
    {
      "distance": 7118.235739071586,
      "timestamp": 2889.90290594101
    },
    {
      "distance": 7130.68505725468,
      "timestamp": 2894.909590065479
    },
    {
      "distance": 7140.744287098655,
      "timestamp": 2898.907609820366
    },
    {
      "distance": 7152.354636373747,
      "timestamp": 2903.924735307693
    },
    {
      "distance": 7163.129546322672,
      "timestamp": 2907.935556471348
    },
    {
      "distance": 7174.021327333073,
      "timestamp": 2911.923591434956
    },
    {
      "distance": 7184.321903954341,
      "timestamp": 2915.912700235844
    },
    {
      "distance": 7194.676548352715,
      "timestamp": 2919.899380922318
    },
    {
      "distance": 7205.330034533891,
      "timestamp": 2923.904239594936
    },
    {
      "distance": 7216.174371006471,
      "timestamp": 2927.9043161273
    },
    {
      "distance": 7227.018715886421,
      "timestamp": 2931.910034358501
    },
    {
      "distance": 7237.919175686594,
      "timestamp": 2935.901742875576
    },
    {
      "distance": 7248.582700063354,
      "timestamp": 2939.908510148525
    },
    {
      "distance": 7259.384394923585,
      "timestamp": 2943.903428435326
    },
    {
      "distance": 7270.284881175025,
      "timestamp": 2947.940514087677
    },
    {
      "distance": 7282.900992662301,
      "timestamp": 2952.918980360031
    },
    {
      "distance": 7293.374849413216,
      "timestamp": 2956.923759281635
    },
    {
      "distance": 7303.801556304491,
      "timestamp": 2960.915481984615
    },
    {
      "distance": 7316.297142315305,
      "timestamp": 2965.914252579212
    },
    {
      "distance": 7326.897347570771,
      "timestamp": 2969.909495353699
    },
    {
      "distance": 7337.653862280793,
      "timestamp": 2973.916955649853
    },
    {
      "distance": 7348.306588981883,
      "timestamp": 2977.916773319244
    },
    {
      "distance": 7359.231538364656,
      "timestamp": 2981.921948611736
    },
    {
      "distance": 7370.066007083404,
      "timestamp": 2985.921743750572
    },
    {
      "distance": 7382.325102293359,
      "timestamp": 2990.92392116785
    },
    {
      "distance": 7392.567188061563,
      "timestamp": 2994.921151161194
    },
    {
      "distance": 7404.827832061015,
      "timestamp": 2999.923826217651
    },
    {
      "distance": 7415.158048068748,
      "timestamp": 3003.909776628017
    },
    {
      "distance": 7425.9034388474165,
      "timestamp": 3007.930160522461
    },
    {
      "distance": 7435.914661183449,
      "timestamp": 3011.915632307529
    },
    {
      "distance": 7446.332597806318,
      "timestamp": 3015.9098508358
    },
    {
      "distance": 7456.632777259239,
      "timestamp": 3019.89964222908
    },
    {
      "distance": 7467.004942064183,
      "timestamp": 3023.896739244461
    },
    {
      "distance": 7477.517224884785,
      "timestamp": 3027.910896420479
    },
    {
      "distance": 7488.066879285322,
      "timestamp": 3031.90095603466
    },
    {
      "distance": 7498.20741491638,
      "timestamp": 3035.898154437542
    },
    {
      "distance": 7509.043846835706,
      "timestamp": 3039.904647171497
    },
    {
      "distance": 7519.586232427942,
      "timestamp": 3043.881591200829
    },
    {
      "distance": 7531.920790820539,
      "timestamp": 3048.918951153755
    },
    {
      "distance": 7542.00359437942,
      "timestamp": 3052.923996210098
    },
    {
      "distance": 7554.263266645126,
      "timestamp": 3057.915348112583
    },
    {
      "distance": 7564.329812667799,
      "timestamp": 3061.929452359676
    },
    {
      "distance": 7575.567274344564,
      "timestamp": 3067.897019684315
    },
    {
      "distance": 7586.402830453714,
      "timestamp": 3072.928241372108
    },
    {
      "distance": 7596.802761952739,
      "timestamp": 3076.922519505024
    },
    {
      "distance": 7607.758077513223,
      "timestamp": 3080.916445374489
    },
    {
      "distance": 7618.58528033668,
      "timestamp": 3084.902734220028
    },
    {
      "distance": 7629.826108583299,
      "timestamp": 3088.904104948044
    },
    {
      "distance": 7640.859608682913,
      "timestamp": 3092.878501594067
    },
    {
      "distance": 7651.259577517901,
      "timestamp": 3096.914912223816
    },
    {
      "distance": 7661.808109087886,
      "timestamp": 3100.920389711857
    },
    {
      "distance": 7672.613621093908,
      "timestamp": 3104.923246502876
    },
    {
      "distance": 7683.739365741684,
      "timestamp": 3108.928793132305
    },
    {
      "distance": 7694.901320367536,
      "timestamp": 3112.893858909607
    },
    {
      "distance": 7705.84962555351,
      "timestamp": 3116.9013333320618
    },
    {
      "distance": 7716.9043150243915,
      "timestamp": 3120.921374678612
    },
    {
      "distance": 7728.043136318366,
      "timestamp": 3124.885481178761
    },
    {
      "distance": 7738.920968826343,
      "timestamp": 3128.895228505135
    },
    {
      "distance": 7749.03059923888,
      "timestamp": 3132.896887660027
    },
    {
      "distance": 7759.1190697056345,
      "timestamp": 3136.895978212357
    },
    {
      "distance": 7769.830239985037,
      "timestamp": 3140.885776817799
    },
    {
      "distance": 7780.7428834422335,
      "timestamp": 3144.89742732048
    },
    {
      "distance": 7791.5604434258385,
      "timestamp": 3148.889504373074
    },
    {
      "distance": 7801.98082445809,
      "timestamp": 3152.922763824463
    },
    {
      "distance": 7812.569719018597,
      "timestamp": 3156.895421922207
    },
    {
      "distance": 7823.797967241546,
      "timestamp": 3160.8924232125282
    },
    {
      "distance": 7835.721037092356,
      "timestamp": 3164.900795102119
    },
    {
      "distance": 7847.177581080567,
      "timestamp": 3168.929575264454
    },
    {
      "distance": 7858.858361300125,
      "timestamp": 3172.924442410469
    },
    {
      "distance": 7869.771036281436,
      "timestamp": 3176.907479524612
    },
    {
      "distance": 7880.522969323839,
      "timestamp": 3180.909806549549
    },
    {
      "distance": 7891.266807373032,
      "timestamp": 3184.913917601109
    },
    {
      "distance": 7902.356918928678,
      "timestamp": 3188.886023104191
    },
    {
      "distance": 7912.657852016477,
      "timestamp": 3192.893143594265
    },
    {
      "distance": 7923.180861948419,
      "timestamp": 3196.889365911484
    },
    {
      "distance": 7934.2290647620675,
      "timestamp": 3200.685401201248
    },
    {
      "distance": 7945.2439863131385,
      "timestamp": 3204.895755708218
    },
    {
      "distance": 7956.390396420019,
      "timestamp": 3208.910800039768
    },
    {
      "distance": 7968.5087723051465,
      "timestamp": 3212.915864050388
    },
    {
      "distance": 7980.300415399012,
      "timestamp": 3216.932485222816
    },
    {
      "distance": 7992.136661569146,
      "timestamp": 3220.914798080921
    },
    {
      "distance": 8003.479086878977,
      "timestamp": 3224.915277659893
    },
    {
      "distance": 8015.4263209548135,
      "timestamp": 3228.916244328022
    },
    {
      "distance": 8027.71614127741,
      "timestamp": 3232.905561208725
    },
    {
      "distance": 8039.848243315656,
      "timestamp": 3236.885067939758
    },
    {
      "distance": 8051.338496705805,
      "timestamp": 3240.905414760113
    },
    {
      "distance": 8062.762418459342,
      "timestamp": 3244.92727035284
    },
    {
      "distance": 8074.186345619824,
      "timestamp": 3248.905010402203
    },
    {
      "distance": 8085.358816005327,
      "timestamp": 3252.893506348133
    },
    {
      "distance": 8096.399685126347,
      "timestamp": 3256.895872354507
    },
    {
      "distance": 8107.518088881796,
      "timestamp": 3260.925081551075
    },
    {
      "distance": 8118.406419684827,
      "timestamp": 3264.893037796021
    },
    {
      "distance": 8130.9438952128885,
      "timestamp": 3268.919891357422
    },
    {
      "distance": 8141.0144069694215,
      "timestamp": 3271.9194641709328
    },
    {
      "distance": 8152.462608216115,
      "timestamp": 3275.917770326138
    },
    {
      "distance": 8163.748430056261,
      "timestamp": 3279.922444045544
    },
    {
      "distance": 8175.722638769023,
      "timestamp": 3283.927238881588
    },
    {
      "distance": 8187.534121170887,
      "timestamp": 3287.88397115469
    },
    {
      "distance": 8199.38331636527,
      "timestamp": 3291.892125248909
    },
    {
      "distance": 8210.798757379393,
      "timestamp": 3295.878521621227
    },
    {
      "distance": 8222.979336053073,
      "timestamp": 3299.897356569767
    },
    {
      "distance": 8234.637488602619,
      "timestamp": 3303.9024913311
    },
    {
      "distance": 8245.614026825284,
      "timestamp": 3307.919719219208
    },
    {
      "distance": 8257.201771028269,
      "timestamp": 3311.91778755188
    },
    {
      "distance": 8269.242021394217,
      "timestamp": 3315.915286719799
    },
    {
      "distance": 8280.395154731854,
      "timestamp": 3319.920228481293
    },
    {
      "distance": 8291.417140756746,
      "timestamp": 3323.921663105488
    },
    {
      "distance": 8301.827405933616,
      "timestamp": 3327.911707103252
    },
    {
      "distance": 8313.76893143162,
      "timestamp": 3331.921565830708
    },
    {
      "distance": 8325.297512147212,
      "timestamp": 3335.892907738686
    },
    {
      "distance": 8335.85439471308,
      "timestamp": 3339.921022295952
    },
    {
      "distance": 8346.183412592214,
      "timestamp": 3343.918939769268
    },
    {
      "distance": 8357.670113056594,
      "timestamp": 3348.920140624046
    },
    {
      "distance": 8367.775614939403,
      "timestamp": 3352.929910063744
    },
    {
      "distance": 8377.97368738738,
      "timestamp": 3356.914716482162
    },
    {
      "distance": 8390.122026244535,
      "timestamp": 3361.907722771168
    },
    {
      "distance": 8400.232467285377,
      "timestamp": 3365.888850092888
    },
    {
      "distance": 8410.4127690503,
      "timestamp": 3369.912181258202
    },
    {
      "distance": 8422.7557594128,
      "timestamp": 3374.921547889709
    },
    {
      "distance": 8433.785825510042,
      "timestamp": 3378.920776963234
    },
    {
      "distance": 8444.22174292837,
      "timestamp": 3382.902779579163
    },
    {
      "distance": 8454.338212464407,
      "timestamp": 3386.901402175426
    },
    {
      "distance": 8464.796515284781,
      "timestamp": 3390.910628855228
    },
    {
      "distance": 8475.496519139851,
      "timestamp": 3394.915556490421
    },
    {
      "distance": 8486.994779834544,
      "timestamp": 3398.922322869301
    },
    {
      "distance": 8497.81117494405,
      "timestamp": 3402.905034959316
    },
    {
      "distance": 8508.548237886971,
      "timestamp": 3406.91962492466
    },
    {
      "distance": 8519.41142104674,
      "timestamp": 3410.908783495426
    },
    {
      "distance": 8530.344464002032,
      "timestamp": 3414.91623032093
    },
    {
      "distance": 8541.474924180407,
      "timestamp": 3418.92792993784
    },
    {
      "distance": 8552.372492450482,
      "timestamp": 3422.894236862659
    },
    {
      "distance": 8563.577116643966,
      "timestamp": 3426.884502530098
    },
    {
      "distance": 8574.781742104056,
      "timestamp": 3430.884154498577
    },
    {
      "distance": 8585.489576823702,
      "timestamp": 3434.90883231163
    },
    {
      "distance": 8598.062564428788,
      "timestamp": 3439.922169387341
    },
    {
      "distance": 8608.943041556791,
      "timestamp": 3443.908794760704
    },
    {
      "distance": 8619.650879504792,
      "timestamp": 3447.885854184628
    },
    {
      "distance": 8629.93412439814,
      "timestamp": 3451.929418623447
    },
    {
      "distance": 8641.172383412395,
      "timestamp": 3455.924585103989
    },
    {
      "distance": 8653.091107680933,
      "timestamp": 3459.915851831436
    },
    {
      "distance": 8664.59285083987,
      "timestamp": 3463.910014212132
    },
    {
      "distance": 8676.830506210967,
      "timestamp": 3467.907296955585
    },
    {
      "distance": 8688.367697822276,
      "timestamp": 3471.916707217693
    },
    {
      "distance": 8698.922670195077,
      "timestamp": 3475.906365990639
    },
    {
      "distance": 8710.060106033356,
      "timestamp": 3479.896810948849
    },
    {
      "distance": 8720.806292042826,
      "timestamp": 3483.893110692501
    },
    {
      "distance": 8731.776958980312,
      "timestamp": 3487.887936234474
    },
    {
      "distance": 8742.523146478548,
      "timestamp": 3491.899632692337
    },
    {
      "distance": 8753.603335789976,
      "timestamp": 3495.901007592678
    },
    {
      "distance": 8764.283664843471,
      "timestamp": 3499.901570558548
    },
    {
      "distance": 8775.13585887315,
      "timestamp": 3503.902984440327
    },
    {
      "distance": 8787.03611669207,
      "timestamp": 3507.948273956776
    },
    {
      "distance": 8799.11856110474,
      "timestamp": 3511.923899292946
    },
    {
      "distance": 8810.667184606682,
      "timestamp": 3515.910066485405
    },
    {
      "distance": 8821.884053550219,
      "timestamp": 3519.929517328739
    },
    {
      "distance": 8832.862297213527,
      "timestamp": 3523.89245814085
    },
    {
      "distance": 8844.070207701547,
      "timestamp": 3527.891762256622
    },
    {
      "distance": 8855.516896561556,
      "timestamp": 3531.893781125546
    },
    {
      "distance": 8866.056177886898,
      "timestamp": 3535.898387372494
    },
    {
      "distance": 8876.892058058487,
      "timestamp": 3539.894744515419
    },
    {
      "distance": 8888.20904939633,
      "timestamp": 3543.899399638176
    },
    {
      "distance": 8899.55349943212,
      "timestamp": 3547.89266461134
    },
    {
      "distance": 8910.790843169143,
      "timestamp": 3551.900651752949
    },
    {
      "distance": 8921.644431919363,
      "timestamp": 3555.890377819538
    },
    {
      "distance": 8932.404091581284,
      "timestamp": 3559.891832113266
    },
    {
      "distance": 8943.381386434807,
      "timestamp": 3563.911036133766
    },
    {
      "distance": 8954.631585704159,
      "timestamp": 3567.931299328804
    },
    {
      "distance": 8965.716466435924,
      "timestamp": 3571.915322244167
    },
    {
      "distance": 8977.619988692619,
      "timestamp": 3575.913768470287
    },
    {
      "distance": 8988.87244098525,
      "timestamp": 3579.928138434887
    },
    {
      "distance": 9000.23459160008,
      "timestamp": 3583.928177952766
    },
    {
      "distance": 9011.804552192374,
      "timestamp": 3587.936124622822
    },
    {
      "distance": 9022.950808333118,
      "timestamp": 3591.870410978794
    },
    {
      "distance": 9033.710392526968,
      "timestamp": 3595.898748874664
    },
    {
      "distance": 9044.24797639304,
      "timestamp": 3599.921793043613
    },
    {
      "distance": 9055.1333029746,
      "timestamp": 3603.901871442795
    },
    {
      "distance": 9066.2078037244,
      "timestamp": 3607.907918930054
    },
    {
      "distance": 9077.87244320353,
      "timestamp": 3611.884065568447
    },
    {
      "distance": 9088.694791935673,
      "timestamp": 3615.90823829174
    },
    {
      "distance": 9099.60223086665,
      "timestamp": 3619.883567929268
    },
    {
      "distance": 9110.613528243603,
      "timestamp": 3623.887233912945
    },
    {
      "distance": 9121.05057106492,
      "timestamp": 3627.899090051651
    },
    {
      "distance": 9132.319897404903,
      "timestamp": 3631.885082125664
    },
    {
      "distance": 9143.170532006628,
      "timestamp": 3635.88714581728
    },
    {
      "distance": 9153.548829266092,
      "timestamp": 3639.923024296761
    },
    {
      "distance": 9164.160792635552,
      "timestamp": 3643.915675640106
    },
    {
      "distance": 9175.023208201941,
      "timestamp": 3647.917856931686
    },
    {
      "distance": 9186.571561674597,
      "timestamp": 3651.928237557411
    },
    {
      "distance": 9197.569856263814,
      "timestamp": 3655.891201794147
    },
    {
      "distance": 9208.37304953539,
      "timestamp": 3659.90183442831
    },
    {
      "distance": 9219.06566696446,
      "timestamp": 3663.873132944107
    },
    {
      "distance": 9230.428424658112,
      "timestamp": 3667.887815952301
    },
    {
      "distance": 9241.566047762819,
      "timestamp": 3671.895941436291
    },
    {
      "distance": 9252.950901585575,
      "timestamp": 3675.926113665104
    },
    {
      "distance": 9263.674377218791,
      "timestamp": 3679.94129472971
    },
    {
      "distance": 9274.652280833045,
      "timestamp": 3683.874075889587
    },
    {
      "distance": 9284.884002714161,
      "timestamp": 3687.886391878128
    },
    {
      "distance": 9295.178844871038,
      "timestamp": 3691.907626509666
    },
    {
      "distance": 9307.715883833118,
      "timestamp": 3696.9045804739
    },
    {
      "distance": 9317.776857989378,
      "timestamp": 3700.924566507339
    },
    {
      "distance": 9328.649752987416,
      "timestamp": 3704.923183679581
    },
    {
      "distance": 9338.895826404363,
      "timestamp": 3708.928994357586
    },
    {
      "distance": 9349.280435585815,
      "timestamp": 3712.897530734539
    },
    {
      "distance": 9361.504783526294,
      "timestamp": 3717.891240358353
    },
    {
      "distance": 9371.5608067877,
      "timestamp": 3721.889930844307
    },
    {
      "distance": 9382.125312103515,
      "timestamp": 3725.888534128666
    },
    {
      "distance": 9392.71936723985,
      "timestamp": 3729.922832846642
    },
    {
      "distance": 9403.20407189716,
      "timestamp": 3733.91327470541
    },
    {
      "distance": 9413.703373306136,
      "timestamp": 3737.905190169811
    },
    {
      "distance": 9424.365680946248,
      "timestamp": 3741.898911058903
    },
    {
      "distance": 9434.426566867302,
      "timestamp": 3745.889621198177
    },
    {
      "distance": 9445.449794493108,
      "timestamp": 3749.900165975094
    },
    {
      "distance": 9456.16310123741,
      "timestamp": 3753.8884293437
    },
    {
      "distance": 9467.202022801584,
      "timestamp": 3757.919684171677
    },
    {
      "distance": 9477.247286531625,
      "timestamp": 3761.923373520374
    },
    {
      "distance": 9488.224182732458,
      "timestamp": 3765.919051527977
    },
    {
      "distance": 9501.03493623354,
      "timestamp": 3770.924046218395
    },
    {
      "distance": 9512.060419512341,
      "timestamp": 3774.915111839771
    },
    {
      "distance": 9523.190295201959,
      "timestamp": 3778.880281925201
    },
    {
      "distance": 9533.698141352654,
      "timestamp": 3782.895601511002
    },
    {
      "distance": 9545.879020481452,
      "timestamp": 3786.907674193382
    },
    {
      "distance": 9557.369363226338,
      "timestamp": 3790.88064789772
    },
    {
      "distance": 9568.79537339163,
      "timestamp": 3794.8880828619
    },
    {
      "distance": 9579.518689513952,
      "timestamp": 3798.90886515379
    },
    {
      "distance": 9590.379592882382,
      "timestamp": 3802.909419834614
    },
    {
      "distance": 9601.273303756398,
      "timestamp": 3806.895129144192
    },
    {
      "distance": 9612.421410172343,
      "timestamp": 3810.919521927834
    },
    {
      "distance": 9622.933495032252,
      "timestamp": 3814.921536386013
    },
    {
      "distance": 9633.754242122997,
      "timestamp": 3818.919403910637
    },
    {
      "distance": 9644.467725579772,
      "timestamp": 3822.93130427599
    },
    {
      "distance": 9655.38297775077,
      "timestamp": 3826.90153503418
    },
    {
      "distance": 9666.365991289462,
      "timestamp": 3830.919351279736
    },
    {
      "distance": 9677.641074577767,
      "timestamp": 3834.92324000597
    },
    {
      "distance": 9688.603194408684,
      "timestamp": 3838.915789484978
    },
    {
      "distance": 9699.81072868232,
      "timestamp": 3842.914768397808
    },
    {
      "distance": 9710.895891843278,
      "timestamp": 3846.918971478939
    },
    {
      "distance": 9721.697196359677,
      "timestamp": 3850.922750532627
    },
    {
      "distance": 9732.367173476756,
      "timestamp": 3854.921368122101
    },
    {
      "distance": 9742.90607061597,
      "timestamp": 3858.912559270859
    },
    {
      "distance": 9753.724303850693,
      "timestamp": 3862.884685814381
    },
    {
      "distance": 9764.304781883566,
      "timestamp": 3866.888993263245
    },
    {
      "distance": 9775.107880179692,
      "timestamp": 3870.917597413063
    },
    {
      "distance": 9785.891916739562,
      "timestamp": 3874.917586803436
    },
    {
      "distance": 9797.075923549577,
      "timestamp": 3878.924696087837
    },
    {
      "distance": 9808.00696047902,
      "timestamp": 3882.917862474918
    },
    {
      "distance": 9818.74263064195,
      "timestamp": 3886.916157901287
    },
    {
      "distance": 9828.894158531402,
      "timestamp": 3890.935343444347
    },
    {
      "distance": 9839.331085602871,
      "timestamp": 3894.913139283657
    },
    {
      "distance": 9849.811145981295,
      "timestamp": 3898.926809430122
    },
    {
      "distance": 9860.36410625688,
      "timestamp": 3902.925979018211
    },
    {
      "distance": 9870.772254213694,
      "timestamp": 3906.930159747601
    },
    {
      "distance": 9881.059431860222,
      "timestamp": 3910.918445706367
    },
    {
      "distance": 9893.252804907892,
      "timestamp": 3915.9293296337128
    },
    {
      "distance": 9903.854309085818,
      "timestamp": 3919.912897109985
    },
    {
      "distance": 9914.872194434723,
      "timestamp": 3923.92546993494
    },
    {
      "distance": 9926.191125531146,
      "timestamp": 3927.918361902237
    },
    {
      "distance": 9937.248349367013,
      "timestamp": 3931.924874126911
    },
    {
      "distance": 9948.636027815992,
      "timestamp": 3935.92397993803
    },
    {
      "distance": 9959.462989551746,
      "timestamp": 3939.913295507431
    },
    {
      "distance": 9970.550677329691,
      "timestamp": 3943.930884540081
    },
    {
      "distance": 9980.970292181386,
      "timestamp": 3947.916052639484
    },
    {
      "distance": 9991.92672498028,
      "timestamp": 3951.927620410919
    },
    {
      "distance": 10003.129429528557,
      "timestamp": 3955.909311234951
    },
    {
      "distance": 10013.63160591057,
      "timestamp": 3959.891435861588
    },
    {
      "distance": 10024.281000434064,
      "timestamp": 3963.907733857632
    },
    {
      "distance": 10036.4077937808,
      "timestamp": 3968.91966855526
    },
    {
      "distance": 10047.01512277506,
      "timestamp": 3972.6933375597
    },
    {
      "distance": 10057.753487032918,
      "timestamp": 3976.919529080391
    },
    {
      "distance": 10070.048302817275,
      "timestamp": 3981.917073607445
    },
    {
      "distance": 10081.348295962893,
      "timestamp": 3985.923591375351
    },
    {
      "distance": 10092.976327213904,
      "timestamp": 3989.895764231682
    },
    {
      "distance": 10103.096938313744,
      "timestamp": 3993.886053681374
    },
    {
      "distance": 10113.637738943198,
      "timestamp": 3998.925296902657
    },
    {
      "distance": 10123.879914535262,
      "timestamp": 4003.927553653717
    },
    {
      "distance": 10134.945110509063,
      "timestamp": 4007.913462340832
    },
    {
      "distance": 10145.909166456806,
      "timestamp": 4011.874328136444
    },
    {
      "distance": 10157.298393621284,
      "timestamp": 4015.907834768295
    },
    {
      "distance": 10168.470739221495,
      "timestamp": 4019.895298421383
    },
    {
      "distance": 10178.614005910647,
      "timestamp": 4023.901140511036
    },
    {
      "distance": 10189.028949004156,
      "timestamp": 4027.884219408035
    },
    {
      "distance": 10199.845287479304,
      "timestamp": 4031.882326900959
    },
    {
      "distance": 10210.494697522738,
      "timestamp": 4035.913658559322
    },
    {
      "distance": 10221.407600769555,
      "timestamp": 4039.918097674847
    },
    {
      "distance": 10232.372368280856,
      "timestamp": 4043.892608344555
    },
    {
      "distance": 10242.7421582181,
      "timestamp": 4047.905672848225
    },
    {
      "distance": 10254.133452711283,
      "timestamp": 4051.879478931427
    },
    {
      "distance": 10264.662086740895,
      "timestamp": 4055.890239417553
    },
    {
      "distance": 10274.869010886014,
      "timestamp": 4059.919132053852
    },
    {
      "distance": 10285.833463277093,
      "timestamp": 4063.940236449242
    },
    {
      "distance": 10297.230751265413,
      "timestamp": 4067.924600243568
    },
    {
      "distance": 10308.848233459934,
      "timestamp": 4072.930022776127
    },
    {
      "distance": 10320.593926200625,
      "timestamp": 4076.890493512154
    },
    {
      "distance": 10332.388125182531,
      "timestamp": 4080.901062190533
    },
    {
      "distance": 10344.29640901723,
      "timestamp": 4084.88322353363
    },
    {
      "distance": 10356.304737385695,
      "timestamp": 4088.903188169003
    },
    {
      "distance": 10368.121737718073,
      "timestamp": 4092.903350114822
    },
    {
      "distance": 10379.719204215877,
      "timestamp": 4096.8945378661165
    },
    {
      "distance": 10391.561669797411,
      "timestamp": 4100.8838601112375
    },
    {
      "distance": 10403.217348479513,
      "timestamp": 4104.893384933473
    },
    {
      "distance": 10414.570512469758,
      "timestamp": 4108.920194029808
    },
    {
      "distance": 10425.822228383768,
      "timestamp": 4112.9230293631545
    },
    {
      "distance": 10437.073951031689,
      "timestamp": 4116.898788988589
    },
    {
      "distance": 10448.96376780264,
      "timestamp": 4120.889054119587
    },
    {
      "distance": 10460.64984498382,
      "timestamp": 4124.890773534775
    },
    {
      "distance": 10471.977083236414,
      "timestamp": 4128.8804671764365
    },
    {
      "distance": 10483.128009751972,
      "timestamp": 4132.9023027420035
    },
    {
      "distance": 10493.814455183483,
      "timestamp": 4136.8961523771295
    },
    {
      "distance": 10504.853754483407,
      "timestamp": 4140.894029319285
    },
    {
      "distance": 10515.958760073183,
      "timestamp": 4144.898813307284
    },
    {
      "distance": 10526.998074080462,
      "timestamp": 4148.9162972569475
    },
    {
      "distance": 10537.924717512495,
      "timestamp": 4152.923647940159
    },
    {
      "distance": 10548.847508740038,
      "timestamp": 4156.872171521187
    },
    {
      "distance": 10560.084115375686,
      "timestamp": 4160.887642741202
    },
    {
      "distance": 10571.170602849863,
      "timestamp": 4164.888686418532
    },
    {
      "distance": 10582.49252810642,
      "timestamp": 4168.92797523737
    },
    {
      "distance": 10594.136881217952,
      "timestamp": 4172.917893826962
    },
    {
      "distance": 10605.576812321231,
      "timestamp": 4176.934476494789
    },
    {
      "distance": 10616.233412462105,
      "timestamp": 4180.924262702465
    },
    {
      "distance": 10626.841182534592,
      "timestamp": 4184.921052515508
    },
    {
      "distance": 10638.082204155464,
      "timestamp": 4188.921666562557
    },
    {
      "distance": 10648.892148393174,
      "timestamp": 4192.904620885849
    },
    {
      "distance": 10661.19406943545,
      "timestamp": 4196.889271855354
    },
    {
      "distance": 10671.594218616923,
      "timestamp": 4200.891125559807
    },
    {
      "distance": 10681.860412115779,
      "timestamp": 4204.888856351376
    },
    {
      "distance": 10693.402790626807,
      "timestamp": 4208.90011537075
    },
    {
      "distance": 10704.109360333703,
      "timestamp": 4212.895872354507
    },
    {
      "distance": 10714.272066381018,
      "timestamp": 4216.894864976406
    },
    {
      "distance": 10725.261579107906,
      "timestamp": 4220.891583323479
    },
    {
      "distance": 10735.495625576525,
      "timestamp": 4224.894850969315
    },
    {
      "distance": 10746.466775907114,
      "timestamp": 4228.877864301205
    },
    {
      "distance": 10757.84502026207,
      "timestamp": 4232.893285274506
    },
    {
      "distance": 10768.148316764215,
      "timestamp": 4236.908985733986
    },
    {
      "distance": 10778.350464963525,
      "timestamp": 4240.918677687645
    },
    {
      "distance": 10789.791637883549,
      "timestamp": 4245.917368650436
    },
    {
      "distance": 10799.97206895427,
      "timestamp": 4249.913979947567
    },
    {
      "distance": 10811.063917817251,
      "timestamp": 4253.893694460392
    },
    {
      "distance": 10822.753058746755,
      "timestamp": 4257.891914606094
    },
    {
      "distance": 10834.928424002164,
      "timestamp": 4261.879182100296
    },
    {
      "distance": 10846.02798087312,
      "timestamp": 4265.882097601891
    },
    {
      "distance": 10856.908253023124,
      "timestamp": 4269.8884044885635
    },
    {
      "distance": 10868.06429817617,
      "timestamp": 4273.896041154861
    },
    {
      "distance": 10878.287268086227,
      "timestamp": 4277.924357831478
    },
    {
      "distance": 10889.018505783917,
      "timestamp": 4281.916590511799
    },
    {
      "distance": 10901.202901154122,
      "timestamp": 4285.904909014702
    },
    {
      "distance": 10912.781930244615,
      "timestamp": 4289.921244204044
    },
    {
      "distance": 10923.104975970986,
      "timestamp": 4293.917408764362
    },
    {
      "distance": 10933.300478748211,
      "timestamp": 4297.92383491993
    },
    {
      "distance": 10944.020685859527,
      "timestamp": 4301.916054129601
    },
    {
      "distance": 10955.347421663002,
      "timestamp": 4305.917416870594
    },
    {
      "distance": 10966.081695419904,
      "timestamp": 4309.905635178089
    },
    {
      "distance": 10978.585378437585,
      "timestamp": 4314.910236895084
    },
    {
      "distance": 10991.18791961232,
      "timestamp": 4318.919620454311
    },
    {
      "distance": 11002.90499692598,
      "timestamp": 4322.923757135868
    },
    {
      "distance": 11014.823508562005,
      "timestamp": 4326.924447774887
    },
    {
      "distance": 11027.649234292545,
      "timestamp": 4330.890975296497
    },
    {
      "distance": 11039.56091318947,
      "timestamp": 4334.895905077457
    },
    {
      "distance": 11051.603267123668,
      "timestamp": 4338.931445360184
    },
    {
      "distance": 11063.180646318051,
      "timestamp": 4342.929398715496
    },
    {
      "distance": 11075.051828566426,
      "timestamp": 4346.946102440357
    },
    {
      "distance": 11087.27241434074,
      "timestamp": 4350.925757169724
    },
    {
      "distance": 11100.027202048002,
      "timestamp": 4354.931922733784
    },
    {
      "distance": 11111.744446650515,
      "timestamp": 4358.925974845886
    },
    {
      "distance": 11123.404316392676,
      "timestamp": 4362.92759591341
    },
    {
      "distance": 11134.524026710727,
      "timestamp": 4366.928582370281
    },
    {
      "distance": 11145.961602814643,
      "timestamp": 4370.921610236168
    },
    {
      "distance": 11157.220287458094,
      "timestamp": 4374.924192845821
    },
    {
      "distance": 11168.329438245133,
      "timestamp": 4378.929881334305
    },
    {
      "distance": 11180.24738027076,
      "timestamp": 4382.935334265232
    },
    {
      "distance": 11192.112109063448,
      "timestamp": 4386.927208542824
    },
    {
      "distance": 11203.804022552005,
      "timestamp": 4390.912843763828
    },
    {
      "distance": 11215.755640452293,
      "timestamp": 4394.928189277649
    },
    {
      "distance": 11227.78725266856,
      "timestamp": 4398.891191780567
    },
    {
      "distance": 11239.574856018426,
      "timestamp": 4402.903445839882
    },
    {
      "distance": 11251.967843948525,
      "timestamp": 4406.892355084419
    },
    {
      "distance": 11264.524055241149,
      "timestamp": 4410.894069731236
    },
    {
      "distance": 11276.466886642305,
      "timestamp": 4414.907238006592
    },
    {
      "distance": 11288.401952730315,
      "timestamp": 4418.92092692852
    },
    {
      "distance": 11299.888783393893,
      "timestamp": 4422.928286015987
    },
    {
      "distance": 11311.14749196368,
      "timestamp": 4426.928476333618
    },
    {
      "distance": 11322.699265665262,
      "timestamp": 4430.923777461052
    },
    {
      "distance": 11335.018273306245,
      "timestamp": 4434.925312399864
    },
    {
      "distance": 11346.973739112906,
      "timestamp": 4438.920779168606
    },
    {
      "distance": 11358.914648253098,
      "timestamp": 4442.925777316093
    },
    {
      "distance": 11371.051093682483,
      "timestamp": 4446.920828223228
    },
    {
      "distance": 11382.405517085634,
      "timestamp": 4450.922716915607
    },
    {
      "distance": 11394.340620894754,
      "timestamp": 4454.918303906918
    },
    {
      "distance": 11406.620812846872,
      "timestamp": 4458.928476989269
    },
    {
      "distance": 11418.070670249916,
      "timestamp": 4462.924957573414
    },
    {
      "distance": 11430.622501474898,
      "timestamp": 4466.919949948788
    },
    {
      "distance": 11443.331251770116,
      "timestamp": 4470.920350909233
    },
    {
      "distance": 11455.969665355655,
      "timestamp": 4474.917378544807
    },
    {
      "distance": 11469.152082549492,
      "timestamp": 4478.930175662041
    },
    {
      "distance": 11481.454917793466,
      "timestamp": 4482.919393122196
    },
    {
      "distance": 11493.496780727939,
      "timestamp": 4486.908551633358
    },
    {
      "distance": 11505.26607511963,
      "timestamp": 4490.909270226955
    },
    {
      "distance": 11517.548376139439,
      "timestamp": 4494.92448413372
    },
    {
      "distance": 11530.010492541338,
      "timestamp": 4498.939580917358
    },
    {
      "distance": 11541.708801808487,
      "timestamp": 4502.907122790813
    },
    {
      "distance": 11553.35576441702,
      "timestamp": 4506.883941411972
    },
    {
      "distance": 11565.212992123832,
      "timestamp": 4510.888918876648
    },
    {
      "distance": 11577.034192538631,
      "timestamp": 4514.920319259167
    },
    {
      "distance": 11588.866372885159,
      "timestamp": 4518.929106354713
    },
    {
      "distance": 11600.865141294866,
      "timestamp": 4522.912695169449
    },
    {
      "distance": 11611.745673481624,
      "timestamp": 4525.915552318096
    },
    {
      "distance": 11623.812769069256,
      "timestamp": 4528.89441806078
    },
    {
      "distance": 11635.656953910064,
      "timestamp": 4531.900223553181
    },
    {
      "distance": 11646.248748221798,
      "timestamp": 4534.893991947174
    },
    {
      "distance": 11658.162954317928,
      "timestamp": 4538.894778609276
    },
    {
      "distance": 11668.956872243314,
      "timestamp": 4542.892591297626
    },
    {
      "distance": 11680.803052364512,
      "timestamp": 4546.929290473461
    },
    {
      "distance": 11692.504454190293,
      "timestamp": 4550.936728358269
    },
    {
      "distance": 11702.411859861255,
      "timestamp": 4553.9596910476685
    }
  ],
  "activity": "https://runkeeper.com/user/2204726680/activity/779895346",
  "share_map": "Everyone",
  "entry_mode": "API",
  "source": "RunKeeper",
  "nearest_nutrition": "/nearestMeasurement/NUTRITION/47734780/1462208167000",
  "type": "Running",
  "nearest_teammate_sleep": [
    "/nearestMeasurement/SLEEP/14094608/1462208167000",
    "/nearestMeasurement/SLEEP/47734780/1462208167000",
    "/nearestMeasurement/SLEEP/50913669/1462208167000"
  ],
  "userID": 47734780,
  "nearest_teammate_background_activities": [
    "/nearestMeasurement/BACKGROUND_ACTIVITY/14094608/1462208167000",
    "/nearestMeasurement/BACKGROUND_ACTIVITY/47734780/1462208167000",
    "/nearestMeasurement/BACKGROUND_ACTIVITY/50913669/1462208167000"
  ],
  "duration": 4554.999,
  "climb": 58.6515151515151,
  "path": [
    {
      "altitude": 158.16666666666666,
      "latitude": 50.671549,
      "type": "start",
      "timestamp": 0,
      "longitude": 18.023479
    },
    {
      "altitude": 158.28571428571428,
      "latitude": 50.671494,
      "type": "gps",
      "timestamp": 2.930176258087158,
      "longitude": 18.023444
    },
    {
      "altitude": 158.375,
      "latitude": 50.671412,
      "type": "gps",
      "timestamp": 9.915750324726105,
      "longitude": 18.023365
    },
    {
      "altitude": 158.44444444444446,
      "latitude": 50.671403,
      "type": "gps",
      "timestamp": 16.83679163455963,
      "longitude": 18.02321
    },
    {
      "altitude": 158.5,
      "latitude": 50.671394,
      "type": "gps",
      "timestamp": 20.90395486354828,
      "longitude": 18.023065
    },
    {
      "altitude": 158.54545454545453,
      "latitude": 50.67139,
      "type": "gps",
      "timestamp": 24.91493064165115,
      "longitude": 18.022909
    },
    {
      "altitude": 158.63636363636363,
      "latitude": 50.671385,
      "type": "gps",
      "timestamp": 28.92004483938217,
      "longitude": 18.022763
    },
    {
      "altitude": 158.72727272727272,
      "latitude": 50.671377,
      "type": "gps",
      "timestamp": 32.9169984459877,
      "longitude": 18.022609
    },
    {
      "altitude": 158.8181818181818,
      "latitude": 50.67136,
      "type": "gps",
      "timestamp": 36.91759347915649,
      "longitude": 18.022453
    },
    {
      "altitude": 158.9090909090909,
      "latitude": 50.671348,
      "type": "gps",
      "timestamp": 40.89901906251907,
      "longitude": 18.02229
    },
    {
      "altitude": 159,
      "latitude": 50.671359,
      "type": "gps",
      "timestamp": 44.9114254117012,
      "longitude": 18.022125
    },
    {
      "altitude": 159.0909090909091,
      "latitude": 50.671361,
      "type": "gps",
      "timestamp": 48.9062642455101,
      "longitude": 18.021965
    },
    {
      "altitude": 159.1818181818182,
      "latitude": 50.671365,
      "type": "gps",
      "timestamp": 52.90997570753098,
      "longitude": 18.021815
    },
    {
      "altitude": 159.27272727272728,
      "latitude": 50.671367,
      "type": "gps",
      "timestamp": 57.90779548883438,
      "longitude": 18.021639
    },
    {
      "altitude": 159.36363636363637,
      "latitude": 50.671376,
      "type": "gps",
      "timestamp": 62.88045537471771,
      "longitude": 18.021464
    },
    {
      "altitude": 159.45454545454547,
      "latitude": 50.671383,
      "type": "gps",
      "timestamp": 66.91558051109314,
      "longitude": 18.021305
    },
    {
      "altitude": 159.54545454545453,
      "latitude": 50.671388,
      "type": "gps",
      "timestamp": 70.90563756227493,
      "longitude": 18.021156
    },
    {
      "altitude": 159.63636363636363,
      "latitude": 50.671404,
      "type": "gps",
      "timestamp": 74.91661494970322,
      "longitude": 18.020996
    },
    {
      "altitude": 159.72727272727272,
      "latitude": 50.671397,
      "type": "gps",
      "timestamp": 78.90487509965897,
      "longitude": 18.020841
    },
    {
      "altitude": 159.8181818181818,
      "latitude": 50.671417,
      "type": "gps",
      "timestamp": 82.91347640752792,
      "longitude": 18.020693
    },
    {
      "altitude": 159.9090909090909,
      "latitude": 50.671433,
      "type": "gps",
      "timestamp": 86.89318424463272,
      "longitude": 18.020536
    },
    {
      "altitude": 160,
      "latitude": 50.671446,
      "type": "gps",
      "timestamp": 90.88678056001663,
      "longitude": 18.020392
    },
    {
      "altitude": 160,
      "latitude": 50.671457,
      "type": "gps",
      "timestamp": 94.91479206085205,
      "longitude": 18.020246
    },
    {
      "altitude": 160,
      "latitude": 50.671446,
      "type": "gps",
      "timestamp": 99.90488171577454,
      "longitude": 18.020073
    },
    {
      "altitude": 160,
      "latitude": 50.671444,
      "type": "gps",
      "timestamp": 103.8931249976158,
      "longitude": 18.019908
    },
    {
      "altitude": 160,
      "latitude": 50.671447,
      "type": "gps",
      "timestamp": 107.9178832173347,
      "longitude": 18.019738
    },
    {
      "altitude": 160,
      "latitude": 50.671439,
      "type": "gps",
      "timestamp": 112.9054253697395,
      "longitude": 18.019566
    },
    {
      "altitude": 160,
      "latitude": 50.671443,
      "type": "gps",
      "timestamp": 117.8969960808754,
      "longitude": 18.019394
    },
    {
      "altitude": 160,
      "latitude": 50.671456,
      "type": "gps",
      "timestamp": 121.8822475075722,
      "longitude": 18.019235
    },
    {
      "altitude": 160,
      "latitude": 50.671473,
      "type": "gps",
      "timestamp": 125.8988748788834,
      "longitude": 18.019082
    },
    {
      "altitude": 160,
      "latitude": 50.671524,
      "type": "gps",
      "timestamp": 129.88852542638782,
      "longitude": 18.018933
    },
    {
      "altitude": 160.0909090909091,
      "latitude": 50.671555,
      "type": "gps",
      "timestamp": 134.8848271965981,
      "longitude": 18.018772
    },
    {
      "altitude": 160.1818181818182,
      "latitude": 50.671587,
      "type": "gps",
      "timestamp": 139.9116825461388,
      "longitude": 18.018607
    },
    {
      "altitude": 160.27272727272728,
      "latitude": 50.671612,
      "type": "gps",
      "timestamp": 144.911514878273,
      "longitude": 18.018437
    },
    {
      "altitude": 160.36363636363637,
      "latitude": 50.671625,
      "type": "gps",
      "timestamp": 149.8974485397339,
      "longitude": 18.018267
    },
    {
      "altitude": 160.45454545454547,
      "latitude": 50.671618,
      "type": "gps",
      "timestamp": 153.9171625971794,
      "longitude": 18.018117
    },
    {
      "altitude": 160.54545454545453,
      "latitude": 50.671628,
      "type": "gps",
      "timestamp": 157.8979442715645,
      "longitude": 18.017961
    },
    {
      "altitude": 160.63636363636363,
      "latitude": 50.671645,
      "type": "gps",
      "timestamp": 161.9007692933083,
      "longitude": 18.017802
    },
    {
      "altitude": 160.72727272727272,
      "latitude": 50.671654,
      "type": "gps",
      "timestamp": 166.9435971975327,
      "longitude": 18.017643
    },
    {
      "altitude": 160.8181818181818,
      "latitude": 50.671655,
      "type": "gps",
      "timestamp": 171.9215233922005,
      "longitude": 18.01749
    },
    {
      "altitude": 160.9090909090909,
      "latitude": 50.671667,
      "type": "gps",
      "timestamp": 177.9288940429688,
      "longitude": 18.017328
    },
    {
      "altitude": 161,
      "latitude": 50.671659,
      "type": "gps",
      "timestamp": 181.916818022728,
      "longitude": 18.017184
    },
    {
      "altitude": 161.0909090909091,
      "latitude": 50.671669,
      "type": "gps",
      "timestamp": 186.8915907144547,
      "longitude": 18.017007
    },
    {
      "altitude": 161.1818181818182,
      "latitude": 50.6717,
      "type": "gps",
      "timestamp": 190.8998831510544,
      "longitude": 18.016847
    },
    {
      "altitude": 161.27272727272728,
      "latitude": 50.671718,
      "type": "gps",
      "timestamp": 195.8680667281151,
      "longitude": 18.016674
    },
    {
      "altitude": 161.36363636363637,
      "latitude": 50.67174,
      "type": "gps",
      "timestamp": 200.9414580464363,
      "longitude": 18.016517
    },
    {
      "altitude": 161.45454545454547,
      "latitude": 50.67174,
      "type": "gps",
      "timestamp": 204.6199218034744,
      "longitude": 18.016374
    },
    {
      "altitude": 161.54545454545453,
      "latitude": 50.67173,
      "type": "gps",
      "timestamp": 208.9364018440247,
      "longitude": 18.016226
    },
    {
      "altitude": 161.63636363636363,
      "latitude": 50.671747,
      "type": "gps",
      "timestamp": 212.9293947815895,
      "longitude": 18.016081
    },
    {
      "altitude": 161.72727272727272,
      "latitude": 50.671753,
      "type": "gps",
      "timestamp": 217.9144399166107,
      "longitude": 18.015917
    },
    {
      "altitude": 161.8181818181818,
      "latitude": 50.671754,
      "type": "gps",
      "timestamp": 222.8989564776421,
      "longitude": 18.015753
    },
    {
      "altitude": 161.9090909090909,
      "latitude": 50.671758,
      "type": "gps",
      "timestamp": 226.9221653342247,
      "longitude": 18.015604
    },
    {
      "altitude": 162.0909090909091,
      "latitude": 50.671761,
      "type": "gps",
      "timestamp": 231.9170317649841,
      "longitude": 18.015435
    },
    {
      "altitude": 162.1818181818182,
      "latitude": 50.671766,
      "type": "gps",
      "timestamp": 235.9259577393532,
      "longitude": 18.01529
    },
    {
      "altitude": 162.27272727272728,
      "latitude": 50.67178,
      "type": "gps",
      "timestamp": 240.9302534461021,
      "longitude": 18.015123
    },
    {
      "altitude": 162.36363636363637,
      "latitude": 50.671785,
      "type": "gps",
      "timestamp": 245.9200437664986,
      "longitude": 18.014955
    },
    {
      "altitude": 162.45454545454547,
      "latitude": 50.671784,
      "type": "gps",
      "timestamp": 249.9024028778076,
      "longitude": 18.014808
    },
    {
      "altitude": 162.54545454545453,
      "latitude": 50.671796,
      "type": "gps",
      "timestamp": 253.9086167216301,
      "longitude": 18.014666
    },
    {
      "altitude": 162.63636363636363,
      "latitude": 50.671799,
      "type": "gps",
      "timestamp": 257.9204701781273,
      "longitude": 18.014521
    },
    {
      "altitude": 162.72727272727272,
      "latitude": 50.671804,
      "type": "gps",
      "timestamp": 262.8551857471466,
      "longitude": 18.014362
    },
    {
      "altitude": 162.8181818181818,
      "latitude": 50.671818,
      "type": "gps",
      "timestamp": 266.9251835942268,
      "longitude": 18.014222
    },
    {
      "altitude": 162.9090909090909,
      "latitude": 50.671826,
      "type": "gps",
      "timestamp": 270.9127908349037,
      "longitude": 18.014079
    },
    {
      "altitude": 163,
      "latitude": 50.67184,
      "type": "gps",
      "timestamp": 274.9151801466942,
      "longitude": 18.013936
    },
    {
      "altitude": 163,
      "latitude": 50.67185,
      "type": "gps",
      "timestamp": 278.9174304008484,
      "longitude": 18.013784
    },
    {
      "altitude": 162.9090909090909,
      "latitude": 50.671868,
      "type": "gps",
      "timestamp": 283.92279535532,
      "longitude": 18.013618
    },
    {
      "altitude": 162.8181818181818,
      "latitude": 50.671878,
      "type": "gps",
      "timestamp": 287.9241214990616,
      "longitude": 18.013475
    },
    {
      "altitude": 162.72727272727272,
      "latitude": 50.671879,
      "type": "gps",
      "timestamp": 292.9222133755684,
      "longitude": 18.013307
    },
    {
      "altitude": 162.63636363636363,
      "latitude": 50.671888,
      "type": "gps",
      "timestamp": 297.924323618412,
      "longitude": 18.013132
    },
    {
      "altitude": 162.54545454545453,
      "latitude": 50.671889,
      "type": "gps",
      "timestamp": 302.9245515465736,
      "longitude": 18.012969
    },
    {
      "altitude": 162.45454545454547,
      "latitude": 50.671897,
      "type": "gps",
      "timestamp": 307.9235184788704,
      "longitude": 18.012798
    },
    {
      "altitude": 162.36363636363637,
      "latitude": 50.671906,
      "type": "gps",
      "timestamp": 312.9285167455673,
      "longitude": 18.012648
    },
    {
      "altitude": 162.27272727272728,
      "latitude": 50.671921,
      "type": "gps",
      "timestamp": 317.9246334433556,
      "longitude": 18.012496
    },
    {
      "altitude": 162.1818181818182,
      "latitude": 50.671936,
      "type": "gps",
      "timestamp": 322.9078978300095,
      "longitude": 18.012335
    },
    {
      "altitude": 162.0909090909091,
      "latitude": 50.671949,
      "type": "gps",
      "timestamp": 326.9219906330109,
      "longitude": 18.012175
    },
    {
      "altitude": 162.0909090909091,
      "latitude": 50.671961,
      "type": "gps",
      "timestamp": 330.916207075119,
      "longitude": 18.012019
    },
    {
      "altitude": 162.1818181818182,
      "latitude": 50.671958,
      "type": "gps",
      "timestamp": 335.9127516150475,
      "longitude": 18.011858
    },
    {
      "altitude": 162.27272727272728,
      "latitude": 50.671964,
      "type": "gps",
      "timestamp": 341.9298070669174,
      "longitude": 18.011699
    },
    {
      "altitude": 162.36363636363637,
      "latitude": 50.671965,
      "type": "gps",
      "timestamp": 349.9186559319496,
      "longitude": 18.011543
    },
    {
      "altitude": 162.45454545454547,
      "latitude": 50.671973,
      "type": "gps",
      "timestamp": 354.9215344190598,
      "longitude": 18.011395
    },
    {
      "altitude": 162.63636363636363,
      "latitude": 50.671962,
      "type": "gps",
      "timestamp": 360.9221829175949,
      "longitude": 18.011243
    },
    {
      "altitude": 162.8181818181818,
      "latitude": 50.671979,
      "type": "gps",
      "timestamp": 367.8943787813187,
      "longitude": 18.01108
    },
    {
      "altitude": 163,
      "latitude": 50.671997,
      "type": "gps",
      "timestamp": 375.9067641496658,
      "longitude": 18.010921
    },
    {
      "altitude": 163.1818181818182,
      "latitude": 50.672014,
      "type": "gps",
      "timestamp": 383.9436094760895,
      "longitude": 18.010747
    },
    {
      "altitude": 163.36363636363637,
      "latitude": 50.67203,
      "type": "gps",
      "timestamp": 388.9198954105377,
      "longitude": 18.010574
    },
    {
      "altitude": 163.63636363636363,
      "latitude": 50.672045,
      "type": "gps",
      "timestamp": 392.9189487695694,
      "longitude": 18.010433
    },
    {
      "altitude": 163.8181818181818,
      "latitude": 50.672051,
      "type": "gps",
      "timestamp": 397.8941000103951,
      "longitude": 18.010269
    },
    {
      "altitude": 164,
      "latitude": 50.672055,
      "type": "gps",
      "timestamp": 401.9341431260109,
      "longitude": 18.010111
    },
    {
      "altitude": 163.8181818181818,
      "latitude": 50.672061,
      "type": "gps",
      "timestamp": 405.922071993351,
      "longitude": 18.009951
    },
    {
      "altitude": 163.63636363636363,
      "latitude": 50.672066,
      "type": "gps",
      "timestamp": 409.8923261761665,
      "longitude": 18.009795
    },
    {
      "altitude": 163.63636363636363,
      "latitude": 50.672066,
      "type": "gps",
      "timestamp": 413.874011695385,
      "longitude": 18.009641
    },
    {
      "altitude": 163.54545454545453,
      "latitude": 50.672075,
      "type": "gps",
      "timestamp": 417.9061740040779,
      "longitude": 18.009487
    },
    {
      "altitude": 163.45454545454547,
      "latitude": 50.672091,
      "type": "gps",
      "timestamp": 421.9191375374794,
      "longitude": 18.009318
    },
    {
      "altitude": 163.36363636363637,
      "latitude": 50.672105,
      "type": "gps",
      "timestamp": 425.9231501817703,
      "longitude": 18.009152
    },
    {
      "altitude": 163.27272727272728,
      "latitude": 50.672115,
      "type": "gps",
      "timestamp": 429.9209381937981,
      "longitude": 18.008978
    },
    {
      "altitude": 163.1818181818182,
      "latitude": 50.672128,
      "type": "gps",
      "timestamp": 433.8947361707687,
      "longitude": 18.008797
    },
    {
      "altitude": 163.0909090909091,
      "latitude": 50.672142,
      "type": "gps",
      "timestamp": 437.8939384222031,
      "longitude": 18.008644
    },
    {
      "altitude": 163,
      "latitude": 50.672154,
      "type": "gps",
      "timestamp": 441.889002263546,
      "longitude": 18.008487
    },
    {
      "altitude": 162.9090909090909,
      "latitude": 50.672167,
      "type": "gps",
      "timestamp": 445.889955997467,
      "longitude": 18.008337
    },
    {
      "altitude": 163.1818181818182,
      "latitude": 50.672178,
      "type": "gps",
      "timestamp": 449.8931273818016,
      "longitude": 18.008177
    },
    {
      "altitude": 163.45454545454547,
      "latitude": 50.672182,
      "type": "gps",
      "timestamp": 453.9240952134132,
      "longitude": 18.008017
    },
    {
      "altitude": 163.54545454545453,
      "latitude": 50.672184,
      "type": "gps",
      "timestamp": 457.922176361084,
      "longitude": 18.007861
    },
    {
      "altitude": 163.63636363636363,
      "latitude": 50.672185,
      "type": "gps",
      "timestamp": 461.9019374847412,
      "longitude": 18.007703
    },
    {
      "altitude": 163.72727272727272,
      "latitude": 50.672185,
      "type": "gps",
      "timestamp": 465.921097278595,
      "longitude": 18.007553
    },
    {
      "altitude": 163.8181818181818,
      "latitude": 50.672196,
      "type": "gps",
      "timestamp": 469.9199976325035,
      "longitude": 18.007401
    },
    {
      "altitude": 163.9090909090909,
      "latitude": 50.672204,
      "type": "gps",
      "timestamp": 473.9293909072876,
      "longitude": 18.007254
    },
    {
      "altitude": 163.8181818181818,
      "latitude": 50.672219,
      "type": "gps",
      "timestamp": 477.8938699960709,
      "longitude": 18.007093
    },
    {
      "altitude": 163.63636363636363,
      "latitude": 50.672231,
      "type": "gps",
      "timestamp": 481.8874847888947,
      "longitude": 18.006939
    },
    {
      "altitude": 163.45454545454547,
      "latitude": 50.672249,
      "type": "gps",
      "timestamp": 485.921445608139,
      "longitude": 18.006783
    },
    {
      "altitude": 163.27272727272728,
      "latitude": 50.672263,
      "type": "gps",
      "timestamp": 489.9174419045448,
      "longitude": 18.006623
    },
    {
      "altitude": 163.0909090909091,
      "latitude": 50.672264,
      "type": "gps",
      "timestamp": 493.9302999377251,
      "longitude": 18.006468
    },
    {
      "altitude": 162.72727272727272,
      "latitude": 50.672265,
      "type": "gps",
      "timestamp": 497.9222159385681,
      "longitude": 18.006313
    },
    {
      "altitude": 162.36363636363637,
      "latitude": 50.672273,
      "type": "gps",
      "timestamp": 501.8840488195419,
      "longitude": 18.006157
    },
    {
      "altitude": 162,
      "latitude": 50.672275,
      "type": "gps",
      "timestamp": 505.8978455066681,
      "longitude": 18.005996
    },
    {
      "altitude": 161.63636363636363,
      "latitude": 50.672285,
      "type": "gps",
      "timestamp": 509.9312393665314,
      "longitude": 18.005839
    },
    {
      "altitude": 161.27272727272728,
      "latitude": 50.672294,
      "type": "gps",
      "timestamp": 513.9463092684746,
      "longitude": 18.005684
    },
    {
      "altitude": 160.9090909090909,
      "latitude": 50.6723,
      "type": "gps",
      "timestamp": 517.9120476841928,
      "longitude": 18.00553
    },
    {
      "altitude": 160.63636363636363,
      "latitude": 50.672307,
      "type": "gps",
      "timestamp": 521.8864986300467,
      "longitude": 18.005373
    },
    {
      "altitude": 160.36363636363637,
      "latitude": 50.672312,
      "type": "gps",
      "timestamp": 525.8972870111465,
      "longitude": 18.005219
    },
    {
      "altitude": 160.0909090909091,
      "latitude": 50.672328,
      "type": "gps",
      "timestamp": 529.8995100855827,
      "longitude": 18.005066
    },
    {
      "altitude": 159.8181818181818,
      "latitude": 50.672339,
      "type": "gps",
      "timestamp": 533.8946027159691,
      "longitude": 18.004909
    },
    {
      "altitude": 159.54545454545453,
      "latitude": 50.672347,
      "type": "gps",
      "timestamp": 537.8944241404533,
      "longitude": 18.004752
    },
    {
      "altitude": 159.45454545454547,
      "latitude": 50.672349,
      "type": "gps",
      "timestamp": 541.9243574142456,
      "longitude": 18.004596
    },
    {
      "altitude": 159.27272727272728,
      "latitude": 50.672346,
      "type": "gps",
      "timestamp": 545.9191459417343,
      "longitude": 18.00444
    },
    {
      "altitude": 159.0909090909091,
      "latitude": 50.672351,
      "type": "gps",
      "timestamp": 549.925998210907,
      "longitude": 18.004291
    },
    {
      "altitude": 158.9090909090909,
      "latitude": 50.67236,
      "type": "gps",
      "timestamp": 553.9201037287712,
      "longitude": 18.004143
    },
    {
      "altitude": 158.72727272727272,
      "latitude": 50.672371,
      "type": "gps",
      "timestamp": 557.9188349843025,
      "longitude": 18.003985
    },
    {
      "altitude": 158.54545454545453,
      "latitude": 50.672391,
      "type": "gps",
      "timestamp": 561.9176114797592,
      "longitude": 18.003833
    },
    {
      "altitude": 158.54545454545453,
      "latitude": 50.672411,
      "type": "gps",
      "timestamp": 565.8940261006355,
      "longitude": 18.003685
    },
    {
      "altitude": 158.54545454545453,
      "latitude": 50.672427,
      "type": "gps",
      "timestamp": 569.8828245997429,
      "longitude": 18.003527
    },
    {
      "altitude": 158.54545454545453,
      "latitude": 50.67243,
      "type": "gps",
      "timestamp": 573.9253593087196,
      "longitude": 18.003378
    },
    {
      "altitude": 158.54545454545453,
      "latitude": 50.672432,
      "type": "gps",
      "timestamp": 577.8961175084114,
      "longitude": 18.003226
    },
    {
      "altitude": 158.54545454545453,
      "latitude": 50.672441,
      "type": "gps",
      "timestamp": 581.8830872178078,
      "longitude": 18.003077
    },
    {
      "altitude": 158.54545454545453,
      "latitude": 50.672444,
      "type": "gps",
      "timestamp": 585.9490391612053,
      "longitude": 18.002923
    },
    {
      "altitude": 158.63636363636363,
      "latitude": 50.672439,
      "type": "gps",
      "timestamp": 589.9217162132263,
      "longitude": 18.002772
    },
    {
      "altitude": 158.72727272727272,
      "latitude": 50.672447,
      "type": "gps",
      "timestamp": 593.9150165319443,
      "longitude": 18.002628
    },
    {
      "altitude": 158.8181818181818,
      "latitude": 50.672456,
      "type": "gps",
      "timestamp": 597.8887577652931,
      "longitude": 18.00248
    },
    {
      "altitude": 158.9090909090909,
      "latitude": 50.672467,
      "type": "gps",
      "timestamp": 601.9121835827827,
      "longitude": 18.002327
    },
    {
      "altitude": 159,
      "latitude": 50.672484,
      "type": "gps",
      "timestamp": 605.9218458533287,
      "longitude": 18.002176
    },
    {
      "altitude": 159.0909090909091,
      "latitude": 50.672501,
      "type": "gps",
      "timestamp": 609.8907898664474,
      "longitude": 18.002023
    },
    {
      "altitude": 159.1818181818182,
      "latitude": 50.672506,
      "type": "gps",
      "timestamp": 613.8966607451439,
      "longitude": 18.001871
    },
    {
      "altitude": 159.27272727272728,
      "latitude": 50.672508,
      "type": "gps",
      "timestamp": 617.9247645735741,
      "longitude": 18.001722
    },
    {
      "altitude": 159.36363636363637,
      "latitude": 50.672531,
      "type": "gps",
      "timestamp": 622.9063078165054,
      "longitude": 18.001547
    },
    {
      "altitude": 159.45454545454547,
      "latitude": 50.672544,
      "type": "gps",
      "timestamp": 626.9208610653877,
      "longitude": 18.001405
    },
    {
      "altitude": 159.54545454545453,
      "latitude": 50.672549,
      "type": "gps",
      "timestamp": 631.8936819434166,
      "longitude": 18.001228
    },
    {
      "altitude": 159.72727272727272,
      "latitude": 50.672558,
      "type": "gps",
      "timestamp": 635.8902465105057,
      "longitude": 18.001083
    },
    {
      "altitude": 159.9090909090909,
      "latitude": 50.672569,
      "type": "gps",
      "timestamp": 639.8915461301804,
      "longitude": 18.000932
    },
    {
      "altitude": 160.0909090909091,
      "latitude": 50.67258,
      "type": "gps",
      "timestamp": 643.8986335396767,
      "longitude": 18.000784
    },
    {
      "altitude": 160.27272727272728,
      "latitude": 50.672589,
      "type": "gps",
      "timestamp": 647.8974481225014,
      "longitude": 18.000634
    },
    {
      "altitude": 160.45454545454547,
      "latitude": 50.672599,
      "type": "gps",
      "timestamp": 651.9170726537704,
      "longitude": 18.000488
    },
    {
      "altitude": 160.54545454545453,
      "latitude": 50.672608,
      "type": "gps",
      "timestamp": 655.8875077962875,
      "longitude": 18.000341
    },
    {
      "altitude": 160.63636363636363,
      "latitude": 50.672611,
      "type": "gps",
      "timestamp": 659.9252818822861,
      "longitude": 18.000193
    },
    {
      "altitude": 160.72727272727272,
      "latitude": 50.672619,
      "type": "gps",
      "timestamp": 663.9196897745132,
      "longitude": 18.000042
    },
    {
      "altitude": 160.8181818181818,
      "latitude": 50.672622,
      "type": "gps",
      "timestamp": 667.9142824411392,
      "longitude": 17.999884
    },
    {
      "altitude": 160.9090909090909,
      "latitude": 50.672635,
      "type": "gps",
      "timestamp": 671.8922784924507,
      "longitude": 17.999727
    },
    {
      "altitude": 161,
      "latitude": 50.672632,
      "type": "gps",
      "timestamp": 675.9233029484749,
      "longitude": 17.999581
    },
    {
      "altitude": 161,
      "latitude": 50.672624,
      "type": "gps",
      "timestamp": 679.9263295531273,
      "longitude": 17.999437
    },
    {
      "altitude": 161,
      "latitude": 50.672632,
      "type": "gps",
      "timestamp": 683.9160143136978,
      "longitude": 17.999286
    },
    {
      "altitude": 161,
      "latitude": 50.672641,
      "type": "gps",
      "timestamp": 687.9205718636513,
      "longitude": 17.999138
    },
    {
      "altitude": 161,
      "latitude": 50.672648,
      "type": "gps",
      "timestamp": 691.9184752702713,
      "longitude": 17.998994
    },
    {
      "altitude": 161,
      "latitude": 50.672655,
      "type": "gps",
      "timestamp": 695.9104213118553,
      "longitude": 17.998847
    },
    {
      "altitude": 161.0909090909091,
      "latitude": 50.672662,
      "type": "gps",
      "timestamp": 699.8969160318375,
      "longitude": 17.998694
    },
    {
      "altitude": 161.1818181818182,
      "latitude": 50.672668,
      "type": "gps",
      "timestamp": 703.9014522433281,
      "longitude": 17.998541
    },
    {
      "altitude": 161.27272727272728,
      "latitude": 50.67267,
      "type": "gps",
      "timestamp": 707.9246025681496,
      "longitude": 17.998392
    },
    {
      "altitude": 161.36363636363637,
      "latitude": 50.67268,
      "type": "gps",
      "timestamp": 711.8922451734543,
      "longitude": 17.998251
    },
    {
      "altitude": 161.45454545454547,
      "latitude": 50.672706,
      "type": "gps",
      "timestamp": 715.9078463315964,
      "longitude": 17.998093
    },
    {
      "altitude": 161.54545454545453,
      "latitude": 50.672722,
      "type": "gps",
      "timestamp": 719.8880279660225,
      "longitude": 17.997932
    },
    {
      "altitude": 161.63636363636363,
      "latitude": 50.672729,
      "type": "gps",
      "timestamp": 723.8909017443657,
      "longitude": 17.997777
    },
    {
      "altitude": 161.72727272727272,
      "latitude": 50.672745,
      "type": "gps",
      "timestamp": 727.9167748093605,
      "longitude": 17.997624
    },
    {
      "altitude": 161.8181818181818,
      "latitude": 50.672762,
      "type": "gps",
      "timestamp": 731.8805075883865,
      "longitude": 17.997478
    },
    {
      "altitude": 161.9090909090909,
      "latitude": 50.672769,
      "type": "gps",
      "timestamp": 735.8819470405579,
      "longitude": 17.997333
    },
    {
      "altitude": 162,
      "latitude": 50.672784,
      "type": "gps",
      "timestamp": 739.8941011428833,
      "longitude": 17.997191
    },
    {
      "altitude": 161.54545454545453,
      "latitude": 50.672799,
      "type": "gps",
      "timestamp": 743.889566898346,
      "longitude": 17.997044
    },
    {
      "altitude": 161.0909090909091,
      "latitude": 50.672811,
      "type": "gps",
      "timestamp": 747.9148442745209,
      "longitude": 17.996901
    },
    {
      "altitude": 160.63636363636363,
      "latitude": 50.672826,
      "type": "gps",
      "timestamp": 751.8921948075294,
      "longitude": 17.996759
    },
    {
      "altitude": 160.1818181818182,
      "latitude": 50.672847,
      "type": "gps",
      "timestamp": 756.9220214486122,
      "longitude": 17.996586
    },
    {
      "altitude": 159.72727272727272,
      "latitude": 50.672877,
      "type": "gps",
      "timestamp": 760.9260841608047,
      "longitude": 17.99645
    },
    {
      "altitude": 159.27272727272728,
      "latitude": 50.67293,
      "type": "gps",
      "timestamp": 764.9211228489876,
      "longitude": 17.996323
    },
    {
      "altitude": 158.8181818181818,
      "latitude": 50.672998,
      "type": "gps",
      "timestamp": 768.9186433553696,
      "longitude": 17.996219
    },
    {
      "altitude": 158.36363636363637,
      "latitude": 50.673091,
      "type": "gps",
      "timestamp": 773.8951703310013,
      "longitude": 17.996125
    },
    {
      "altitude": 157.9090909090909,
      "latitude": 50.673172,
      "type": "gps",
      "timestamp": 777.8902798891068,
      "longitude": 17.996051
    },
    {
      "altitude": 157.45454545454547,
      "latitude": 50.673246,
      "type": "gps",
      "timestamp": 781.9162853956223,
      "longitude": 17.995969
    },
    {
      "altitude": 156.9090909090909,
      "latitude": 50.673325,
      "type": "gps",
      "timestamp": 785.9141488671303,
      "longitude": 17.995892
    },
    {
      "altitude": 156.8181818181818,
      "latitude": 50.673405,
      "type": "gps",
      "timestamp": 789.9251094460487,
      "longitude": 17.995814
    },
    {
      "altitude": 156.63636363636363,
      "latitude": 50.673484,
      "type": "gps",
      "timestamp": 793.92700111866,
      "longitude": 17.995736
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.673562,
      "type": "gps",
      "timestamp": 797.9177783131599,
      "longitude": 17.995663
    },
    {
      "altitude": 156.27272727272728,
      "latitude": 50.673645,
      "type": "gps",
      "timestamp": 801.9334385991096,
      "longitude": 17.995584
    },
    {
      "altitude": 156.0909090909091,
      "latitude": 50.673723,
      "type": "gps",
      "timestamp": 805.9165259599686,
      "longitude": 17.995493
    },
    {
      "altitude": 155.9090909090909,
      "latitude": 50.673799,
      "type": "gps",
      "timestamp": 809.9219307899475,
      "longitude": 17.995404
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.673885,
      "type": "gps",
      "timestamp": 813.9266813993454,
      "longitude": 17.995334
    },
    {
      "altitude": 155.54545454545453,
      "latitude": 50.673981,
      "type": "gps",
      "timestamp": 817.9223150610924,
      "longitude": 17.995342
    },
    {
      "altitude": 155.36363636363637,
      "latitude": 50.674078,
      "type": "gps",
      "timestamp": 821.877256155014,
      "longitude": 17.995347
    },
    {
      "altitude": 155.27272727272728,
      "latitude": 50.674171,
      "type": "gps",
      "timestamp": 825.9278737306595,
      "longitude": 17.995343
    },
    {
      "altitude": 155.27272727272728,
      "latitude": 50.674267,
      "type": "gps",
      "timestamp": 829.910017490387,
      "longitude": 17.995336
    },
    {
      "altitude": 155.27272727272728,
      "latitude": 50.674362,
      "type": "gps",
      "timestamp": 833.9076291322708,
      "longitude": 17.995329
    },
    {
      "altitude": 155.36363636363637,
      "latitude": 50.674455,
      "type": "gps",
      "timestamp": 837.8993787169456,
      "longitude": 17.995317
    },
    {
      "altitude": 155.45454545454547,
      "latitude": 50.674567,
      "type": "gps",
      "timestamp": 842.9158788323402,
      "longitude": 17.995305
    },
    {
      "altitude": 155.54545454545453,
      "latitude": 50.674659,
      "type": "gps",
      "timestamp": 846.9150732159615,
      "longitude": 17.995294
    },
    {
      "altitude": 155.63636363636363,
      "latitude": 50.674753,
      "type": "gps",
      "timestamp": 850.8872973918915,
      "longitude": 17.995283
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.67485,
      "type": "gps",
      "timestamp": 854.88043653965,
      "longitude": 17.995276
    },
    {
      "altitude": 155.8181818181818,
      "latitude": 50.674948,
      "type": "gps",
      "timestamp": 858.8890310525894,
      "longitude": 17.99527
    },
    {
      "altitude": 155.9090909090909,
      "latitude": 50.67505,
      "type": "gps",
      "timestamp": 862.9227654337883,
      "longitude": 17.995262
    },
    {
      "altitude": 156,
      "latitude": 50.675143,
      "type": "gps",
      "timestamp": 866.9234962463379,
      "longitude": 17.99526
    },
    {
      "altitude": 156,
      "latitude": 50.675241,
      "type": "gps",
      "timestamp": 870.8881939053535,
      "longitude": 17.995256
    },
    {
      "altitude": 156,
      "latitude": 50.675338,
      "type": "gps",
      "timestamp": 874.9065843224525,
      "longitude": 17.995254
    },
    {
      "altitude": 156,
      "latitude": 50.675432,
      "type": "gps",
      "timestamp": 878.8849962353706,
      "longitude": 17.995248
    },
    {
      "altitude": 156,
      "latitude": 50.675531,
      "type": "gps",
      "timestamp": 882.8934655189514,
      "longitude": 17.995246
    },
    {
      "altitude": 156,
      "latitude": 50.675633,
      "type": "gps",
      "timestamp": 886.86980509758,
      "longitude": 17.995237
    },
    {
      "altitude": 156,
      "latitude": 50.675729,
      "type": "gps",
      "timestamp": 890.8883600831032,
      "longitude": 17.995228
    },
    {
      "altitude": 155.9090909090909,
      "latitude": 50.675819,
      "type": "gps",
      "timestamp": 894.9034097194672,
      "longitude": 17.995215
    },
    {
      "altitude": 155.8181818181818,
      "latitude": 50.675928,
      "type": "gps",
      "timestamp": 899.8906328678131,
      "longitude": 17.995195
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.67602,
      "type": "gps",
      "timestamp": 903.8869354724884,
      "longitude": 17.995184
    },
    {
      "altitude": 155.63636363636363,
      "latitude": 50.67611,
      "type": "gps",
      "timestamp": 907.9127858877182,
      "longitude": 17.995173
    },
    {
      "altitude": 155.54545454545453,
      "latitude": 50.676223,
      "type": "gps",
      "timestamp": 912.8941050171852,
      "longitude": 17.995155
    },
    {
      "altitude": 155.45454545454547,
      "latitude": 50.676314,
      "type": "gps",
      "timestamp": 916.9202613830566,
      "longitude": 17.995144
    },
    {
      "altitude": 155.36363636363637,
      "latitude": 50.676405,
      "type": "gps",
      "timestamp": 920.9302591085434,
      "longitude": 17.995134
    },
    {
      "altitude": 155.27272727272728,
      "latitude": 50.676497,
      "type": "gps",
      "timestamp": 924.8893720507622,
      "longitude": 17.995128
    },
    {
      "altitude": 155.1818181818182,
      "latitude": 50.676584,
      "type": "gps",
      "timestamp": 928.8904983997345,
      "longitude": 17.995076
    },
    {
      "altitude": 155.1818181818182,
      "latitude": 50.676672,
      "type": "gps",
      "timestamp": 932.9024250507355,
      "longitude": 17.995026
    },
    {
      "altitude": 155.1818181818182,
      "latitude": 50.676762,
      "type": "gps",
      "timestamp": 936.9206899404526,
      "longitude": 17.994994
    },
    {
      "altitude": 155.27272727272728,
      "latitude": 50.676848,
      "type": "gps",
      "timestamp": 940.9224004745483,
      "longitude": 17.994945
    },
    {
      "altitude": 155.36363636363637,
      "latitude": 50.676939,
      "type": "gps",
      "timestamp": 944.9176208376884,
      "longitude": 17.994918
    },
    {
      "altitude": 155.45454545454547,
      "latitude": 50.677032,
      "type": "gps",
      "timestamp": 948.9257856607437,
      "longitude": 17.994898
    },
    {
      "altitude": 155.54545454545453,
      "latitude": 50.677125,
      "type": "gps",
      "timestamp": 952.9031649827957,
      "longitude": 17.994874
    },
    {
      "altitude": 155.63636363636363,
      "latitude": 50.67722,
      "type": "gps",
      "timestamp": 956.8864200115204,
      "longitude": 17.994854
    },
    {
      "altitude": 155.8181818181818,
      "latitude": 50.677321,
      "type": "gps",
      "timestamp": 961.9323435425758,
      "longitude": 17.994822
    },
    {
      "altitude": 156,
      "latitude": 50.677424,
      "type": "gps",
      "timestamp": 966.9434335827827,
      "longitude": 17.994816
    },
    {
      "altitude": 156.0909090909091,
      "latitude": 50.677534,
      "type": "gps",
      "timestamp": 972.9112115502357,
      "longitude": 17.994779
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.677628,
      "type": "gps",
      "timestamp": 976.8871597647667,
      "longitude": 17.994752
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.677718,
      "type": "gps",
      "timestamp": 980.8973392248154,
      "longitude": 17.994725
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.677814,
      "type": "gps",
      "timestamp": 984.9005773663521,
      "longitude": 17.994701
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.677905,
      "type": "gps",
      "timestamp": 988.8878368139267,
      "longitude": 17.994676
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.677998,
      "type": "gps",
      "timestamp": 992.8868998289108,
      "longitude": 17.994654
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.678091,
      "type": "gps",
      "timestamp": 996.888590335846,
      "longitude": 17.994618
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.678187,
      "type": "gps",
      "timestamp": 1000.890759944916,
      "longitude": 17.994578
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.678283,
      "type": "gps",
      "timestamp": 1004.919565737247,
      "longitude": 17.994543
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.678376,
      "type": "gps",
      "timestamp": 1008.92548251152,
      "longitude": 17.994514
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.678473,
      "type": "gps",
      "timestamp": 1012.908185303211,
      "longitude": 17.994484
    },
    {
      "altitude": 156.27272727272728,
      "latitude": 50.678565,
      "type": "gps",
      "timestamp": 1016.896570086479,
      "longitude": 17.99445
    },
    {
      "altitude": 156.36363636363637,
      "latitude": 50.678658,
      "type": "gps",
      "timestamp": 1020.940825164318,
      "longitude": 17.994411
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.678746,
      "type": "gps",
      "timestamp": 1024.917754113674,
      "longitude": 17.994362
    },
    {
      "altitude": 156.54545454545453,
      "latitude": 50.678854,
      "type": "gps",
      "timestamp": 1029.902387797832,
      "longitude": 17.99432
    },
    {
      "altitude": 156.63636363636363,
      "latitude": 50.678959,
      "type": "gps",
      "timestamp": 1034.910328149796,
      "longitude": 17.994271
    },
    {
      "altitude": 156.72727272727272,
      "latitude": 50.679047,
      "type": "gps",
      "timestamp": 1038.903324723244,
      "longitude": 17.994235
    },
    {
      "altitude": 156.8181818181818,
      "latitude": 50.679141,
      "type": "gps",
      "timestamp": 1042.8987488746639,
      "longitude": 17.994201
    },
    {
      "altitude": 156.8181818181818,
      "latitude": 50.679249,
      "type": "gps",
      "timestamp": 1047.888528048992,
      "longitude": 17.994156
    },
    {
      "altitude": 156.8181818181818,
      "latitude": 50.679339,
      "type": "gps",
      "timestamp": 1051.930832803249,
      "longitude": 17.994116
    },
    {
      "altitude": 156.72727272727272,
      "latitude": 50.679432,
      "type": "gps",
      "timestamp": 1055.925020933151,
      "longitude": 17.994072
    },
    {
      "altitude": 156.63636363636363,
      "latitude": 50.679523,
      "type": "gps",
      "timestamp": 1059.924300789833,
      "longitude": 17.994032
    },
    {
      "altitude": 156.54545454545453,
      "latitude": 50.679621,
      "type": "gps",
      "timestamp": 1063.93158197403,
      "longitude": 17.993989
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.679714,
      "type": "gps",
      "timestamp": 1067.928113281727,
      "longitude": 17.993943
    },
    {
      "altitude": 156.36363636363637,
      "latitude": 50.679799,
      "type": "gps",
      "timestamp": 1071.923871397972,
      "longitude": 17.993883
    },
    {
      "altitude": 156.27272727272728,
      "latitude": 50.679891,
      "type": "gps",
      "timestamp": 1075.921162128448,
      "longitude": 17.993829
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.679979,
      "type": "gps",
      "timestamp": 1079.890880644321,
      "longitude": 17.993768
    },
    {
      "altitude": 156.0909090909091,
      "latitude": 50.680067,
      "type": "gps",
      "timestamp": 1083.895773530006,
      "longitude": 17.993703
    },
    {
      "altitude": 156,
      "latitude": 50.680142,
      "type": "gps",
      "timestamp": 1087.940228044987,
      "longitude": 17.993609
    },
    {
      "altitude": 156,
      "latitude": 50.680175,
      "type": "gps",
      "timestamp": 1091.9246422052381,
      "longitude": 17.99347
    },
    {
      "altitude": 156,
      "latitude": 50.680176,
      "type": "gps",
      "timestamp": 1095.9313148260119,
      "longitude": 17.99332
    },
    {
      "altitude": 156,
      "latitude": 50.680243,
      "type": "gps",
      "timestamp": 1102.932431221008,
      "longitude": 17.993211
    },
    {
      "altitude": 156,
      "latitude": 50.680335,
      "type": "gps",
      "timestamp": 1108.931016325951,
      "longitude": 17.993172
    },
    {
      "altitude": 156,
      "latitude": 50.680418,
      "type": "gps",
      "timestamp": 1112.945829391479,
      "longitude": 17.993263
    },
    {
      "altitude": 156,
      "latitude": 50.680489,
      "type": "gps",
      "timestamp": 1116.935740172863,
      "longitude": 17.993358
    },
    {
      "altitude": 156,
      "latitude": 50.68058,
      "type": "gps",
      "timestamp": 1120.910886645317,
      "longitude": 17.993389
    },
    {
      "altitude": 156,
      "latitude": 50.680679,
      "type": "gps",
      "timestamp": 1124.897574961185,
      "longitude": 17.993333
    },
    {
      "altitude": 156,
      "latitude": 50.680767,
      "type": "gps",
      "timestamp": 1128.920484423637,
      "longitude": 17.993259
    },
    {
      "altitude": 156,
      "latitude": 50.680854,
      "type": "gps",
      "timestamp": 1132.918877542019,
      "longitude": 17.993189
    },
    {
      "altitude": 156,
      "latitude": 50.680944,
      "type": "gps",
      "timestamp": 1136.8957067132,
      "longitude": 17.993124
    },
    {
      "altitude": 156,
      "latitude": 50.681031,
      "type": "gps",
      "timestamp": 1140.919206500053,
      "longitude": 17.993058
    },
    {
      "altitude": 156,
      "latitude": 50.681111,
      "type": "gps",
      "timestamp": 1144.916153967381,
      "longitude": 17.992992
    },
    {
      "altitude": 156,
      "latitude": 50.681196,
      "type": "gps",
      "timestamp": 1148.92257630825,
      "longitude": 17.992927
    },
    {
      "altitude": 156,
      "latitude": 50.681284,
      "type": "gps",
      "timestamp": 1152.901358902454,
      "longitude": 17.992861
    },
    {
      "altitude": 156,
      "latitude": 50.681375,
      "type": "gps",
      "timestamp": 1156.923207044601,
      "longitude": 17.992797
    },
    {
      "altitude": 156,
      "latitude": 50.68146,
      "type": "gps",
      "timestamp": 1160.919946491718,
      "longitude": 17.992729
    },
    {
      "altitude": 156,
      "latitude": 50.681542,
      "type": "gps",
      "timestamp": 1164.874756336212,
      "longitude": 17.992659
    },
    {
      "altitude": 156,
      "latitude": 50.681626,
      "type": "gps",
      "timestamp": 1168.888486981392,
      "longitude": 17.992587
    },
    {
      "altitude": 155.8181818181818,
      "latitude": 50.681708,
      "type": "gps",
      "timestamp": 1172.911113202572,
      "longitude": 17.992516
    },
    {
      "altitude": 155.63636363636363,
      "latitude": 50.681788,
      "type": "gps",
      "timestamp": 1176.917804479599,
      "longitude": 17.992434
    },
    {
      "altitude": 155.45454545454547,
      "latitude": 50.681872,
      "type": "gps",
      "timestamp": 1180.925709486008,
      "longitude": 17.992363
    },
    {
      "altitude": 155.27272727272728,
      "latitude": 50.681962,
      "type": "gps",
      "timestamp": 1184.919108867645,
      "longitude": 17.992294
    },
    {
      "altitude": 155.0909090909091,
      "latitude": 50.682053,
      "type": "gps",
      "timestamp": 1188.919276058674,
      "longitude": 17.992221
    },
    {
      "altitude": 154.9090909090909,
      "latitude": 50.682141,
      "type": "gps",
      "timestamp": 1192.895651876926,
      "longitude": 17.992148
    },
    {
      "altitude": 154.72727272727272,
      "latitude": 50.682224,
      "type": "gps",
      "timestamp": 1196.892715096474,
      "longitude": 17.99207
    },
    {
      "altitude": 154.54545454545453,
      "latitude": 50.682304,
      "type": "gps",
      "timestamp": 1200.892406225204,
      "longitude": 17.991994
    },
    {
      "altitude": 154.36363636363637,
      "latitude": 50.682387,
      "type": "gps",
      "timestamp": 1204.919062376022,
      "longitude": 17.991919
    },
    {
      "altitude": 154.1818181818182,
      "latitude": 50.682482,
      "type": "gps",
      "timestamp": 1209.888006269932,
      "longitude": 17.991823
    },
    {
      "altitude": 154,
      "latitude": 50.682571,
      "type": "gps",
      "timestamp": 1214.891687452793,
      "longitude": 17.991719
    },
    {
      "altitude": 154,
      "latitude": 50.682644,
      "type": "gps",
      "timestamp": 1218.895959913731,
      "longitude": 17.991636
    },
    {
      "altitude": 154,
      "latitude": 50.682725,
      "type": "gps",
      "timestamp": 1222.879868865013,
      "longitude": 17.991542
    },
    {
      "altitude": 154,
      "latitude": 50.682806,
      "type": "gps",
      "timestamp": 1226.902442455292,
      "longitude": 17.991454
    },
    {
      "altitude": 154,
      "latitude": 50.682886,
      "type": "gps",
      "timestamp": 1230.910497546196,
      "longitude": 17.991373
    },
    {
      "altitude": 154,
      "latitude": 50.682968,
      "type": "gps",
      "timestamp": 1234.920969605446,
      "longitude": 17.991291
    },
    {
      "altitude": 154,
      "latitude": 50.683047,
      "type": "gps",
      "timestamp": 1238.921620845795,
      "longitude": 17.991205
    },
    {
      "altitude": 154,
      "latitude": 50.683125,
      "type": "gps",
      "timestamp": 1242.890902221203,
      "longitude": 17.991115
    },
    {
      "altitude": 154,
      "latitude": 50.683206,
      "type": "gps",
      "timestamp": 1246.892236292362,
      "longitude": 17.991032
    },
    {
      "altitude": 154,
      "latitude": 50.683283,
      "type": "gps",
      "timestamp": 1250.899865090847,
      "longitude": 17.990947
    },
    {
      "altitude": 154,
      "latitude": 50.683366,
      "type": "gps",
      "timestamp": 1254.88707780838,
      "longitude": 17.990864
    },
    {
      "altitude": 154.1818181818182,
      "latitude": 50.68344,
      "type": "gps",
      "timestamp": 1258.920699834824,
      "longitude": 17.990769
    },
    {
      "altitude": 154.36363636363637,
      "latitude": 50.683516,
      "type": "gps",
      "timestamp": 1262.920493483543,
      "longitude": 17.990674
    },
    {
      "altitude": 154.54545454545453,
      "latitude": 50.683594,
      "type": "gps",
      "timestamp": 1266.914494991302,
      "longitude": 17.990582
    },
    {
      "altitude": 154.72727272727272,
      "latitude": 50.683675,
      "type": "gps",
      "timestamp": 1270.937974333763,
      "longitude": 17.990493
    },
    {
      "altitude": 154.9090909090909,
      "latitude": 50.683755,
      "type": "gps",
      "timestamp": 1274.922912597656,
      "longitude": 17.990405
    },
    {
      "altitude": 155.0909090909091,
      "latitude": 50.683835,
      "type": "gps",
      "timestamp": 1278.914714097977,
      "longitude": 17.99032
    },
    {
      "altitude": 155.27272727272728,
      "latitude": 50.683916,
      "type": "gps",
      "timestamp": 1282.879028379917,
      "longitude": 17.990247
    },
    {
      "altitude": 155.45454545454547,
      "latitude": 50.684001,
      "type": "gps",
      "timestamp": 1286.8931998610499,
      "longitude": 17.99019
    },
    {
      "altitude": 155.63636363636363,
      "latitude": 50.684093,
      "type": "gps",
      "timestamp": 1290.915308594704,
      "longitude": 17.990178
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.684184,
      "type": "gps",
      "timestamp": 1294.885758817196,
      "longitude": 17.99016
    },
    {
      "altitude": 155.8181818181818,
      "latitude": 50.68429,
      "type": "gps",
      "timestamp": 1299.893720507622,
      "longitude": 17.990123
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.684319,
      "type": "gps",
      "timestamp": 1304.91407930851,
      "longitude": 17.989956
    },
    {
      "altitude": 155.54545454545453,
      "latitude": 50.684311,
      "type": "gps",
      "timestamp": 1308.945923089981,
      "longitude": 17.989795
    },
    {
      "altitude": 155.36363636363637,
      "latitude": 50.684358,
      "type": "gps",
      "timestamp": 1312.904597043991,
      "longitude": 17.989664
    },
    {
      "altitude": 155.1818181818182,
      "latitude": 50.684436,
      "type": "gps",
      "timestamp": 1316.905579328537,
      "longitude": 17.989577
    },
    {
      "altitude": 155,
      "latitude": 50.684513,
      "type": "gps",
      "timestamp": 1320.893459975719,
      "longitude": 17.989491
    },
    {
      "altitude": 154.8181818181818,
      "latitude": 50.684588,
      "type": "gps",
      "timestamp": 1324.900768756866,
      "longitude": 17.989397
    },
    {
      "altitude": 154.63636363636363,
      "latitude": 50.684656,
      "type": "gps",
      "timestamp": 1328.920089125633,
      "longitude": 17.989298
    },
    {
      "altitude": 154.45454545454547,
      "latitude": 50.684737,
      "type": "gps",
      "timestamp": 1333.893104851246,
      "longitude": 17.989175
    },
    {
      "altitude": 154.27272727272728,
      "latitude": 50.684802,
      "type": "gps",
      "timestamp": 1337.891545474529,
      "longitude": 17.989073
    },
    {
      "altitude": 154.1818181818182,
      "latitude": 50.684862,
      "type": "gps",
      "timestamp": 1341.899197340012,
      "longitude": 17.988964
    },
    {
      "altitude": 154.0909090909091,
      "latitude": 50.684934,
      "type": "gps",
      "timestamp": 1345.886246085167,
      "longitude": 17.988864
    },
    {
      "altitude": 154,
      "latitude": 50.684999,
      "type": "gps",
      "timestamp": 1349.895648598671,
      "longitude": 17.98876
    },
    {
      "altitude": 154,
      "latitude": 50.685062,
      "type": "gps",
      "timestamp": 1353.881751477718,
      "longitude": 17.988656
    },
    {
      "altitude": 154,
      "latitude": 50.685126,
      "type": "gps",
      "timestamp": 1357.884127557278,
      "longitude": 17.988555
    },
    {
      "altitude": 153.9090909090909,
      "latitude": 50.685195,
      "type": "gps",
      "timestamp": 1361.891215085983,
      "longitude": 17.988457
    },
    {
      "altitude": 153.8181818181818,
      "latitude": 50.685275,
      "type": "gps",
      "timestamp": 1366.92406898737,
      "longitude": 17.988334
    },
    {
      "altitude": 153.72727272727272,
      "latitude": 50.68534,
      "type": "gps",
      "timestamp": 1370.909236490726,
      "longitude": 17.988232
    },
    {
      "altitude": 153.63636363636363,
      "latitude": 50.68541,
      "type": "gps",
      "timestamp": 1374.916836678982,
      "longitude": 17.988122
    },
    {
      "altitude": 153.54545454545453,
      "latitude": 50.685482,
      "type": "gps",
      "timestamp": 1378.889989733696,
      "longitude": 17.988026
    },
    {
      "altitude": 153.45454545454547,
      "latitude": 50.685558,
      "type": "gps",
      "timestamp": 1382.918338656425,
      "longitude": 17.987933
    },
    {
      "altitude": 153.36363636363637,
      "latitude": 50.685625,
      "type": "gps",
      "timestamp": 1386.923959732056,
      "longitude": 17.987828
    },
    {
      "altitude": 153.27272727272728,
      "latitude": 50.685688,
      "type": "gps",
      "timestamp": 1390.891817808151,
      "longitude": 17.987718
    },
    {
      "altitude": 153.1818181818182,
      "latitude": 50.68575,
      "type": "gps",
      "timestamp": 1394.918452501297,
      "longitude": 17.987611
    },
    {
      "altitude": 153.0909090909091,
      "latitude": 50.685809,
      "type": "gps",
      "timestamp": 1398.926974952221,
      "longitude": 17.9875
    },
    {
      "altitude": 153,
      "latitude": 50.685872,
      "type": "gps",
      "timestamp": 1402.903422772884,
      "longitude": 17.98739
    },
    {
      "altitude": 153,
      "latitude": 50.685939,
      "type": "gps",
      "timestamp": 1406.891825973988,
      "longitude": 17.98728
    },
    {
      "altitude": 153.1818181818182,
      "latitude": 50.686001,
      "type": "gps",
      "timestamp": 1410.919786632061,
      "longitude": 17.987172
    },
    {
      "altitude": 153.36363636363637,
      "latitude": 50.686068,
      "type": "gps",
      "timestamp": 1414.921706914902,
      "longitude": 17.987054
    },
    {
      "altitude": 153.54545454545453,
      "latitude": 50.686133,
      "type": "gps",
      "timestamp": 1418.890853583813,
      "longitude": 17.986935
    },
    {
      "altitude": 153.72727272727272,
      "latitude": 50.686199,
      "type": "gps",
      "timestamp": 1422.883132517338,
      "longitude": 17.986826
    },
    {
      "altitude": 153.9090909090909,
      "latitude": 50.686268,
      "type": "gps",
      "timestamp": 1426.908781647682,
      "longitude": 17.98672
    },
    {
      "altitude": 154.0909090909091,
      "latitude": 50.686333,
      "type": "gps",
      "timestamp": 1430.927483201027,
      "longitude": 17.986607
    },
    {
      "altitude": 154.27272727272728,
      "latitude": 50.686388,
      "type": "gps",
      "timestamp": 1434.891165435314,
      "longitude": 17.986492
    },
    {
      "altitude": 154.45454545454547,
      "latitude": 50.686443,
      "type": "gps",
      "timestamp": 1438.889725863934,
      "longitude": 17.986377
    },
    {
      "altitude": 154.63636363636363,
      "latitude": 50.6865,
      "type": "gps",
      "timestamp": 1442.898270308971,
      "longitude": 17.986264
    },
    {
      "altitude": 154.8181818181818,
      "latitude": 50.686556,
      "type": "gps",
      "timestamp": 1446.885938346386,
      "longitude": 17.986152
    },
    {
      "altitude": 155,
      "latitude": 50.686628,
      "type": "gps",
      "timestamp": 1451.908323407173,
      "longitude": 17.986019
    },
    {
      "altitude": 155,
      "latitude": 50.686695,
      "type": "gps",
      "timestamp": 1456.893562495708,
      "longitude": 17.985881
    },
    {
      "altitude": 155,
      "latitude": 50.686754,
      "type": "gps",
      "timestamp": 1460.891140401363,
      "longitude": 17.985769
    },
    {
      "altitude": 155.1818181818182,
      "latitude": 50.686815,
      "type": "gps",
      "timestamp": 1464.925799965858,
      "longitude": 17.985654
    },
    {
      "altitude": 155.36363636363637,
      "latitude": 50.686879,
      "type": "gps",
      "timestamp": 1468.923430919647,
      "longitude": 17.985545
    },
    {
      "altitude": 155.54545454545453,
      "latitude": 50.686956,
      "type": "gps",
      "timestamp": 1473.901125013828,
      "longitude": 17.98543
    },
    {
      "altitude": 155.63636363636363,
      "latitude": 50.687015,
      "type": "gps",
      "timestamp": 1479.9058598876,
      "longitude": 17.985299
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.687068,
      "type": "gps",
      "timestamp": 1483.902597010136,
      "longitude": 17.985171
    },
    {
      "altitude": 155.8181818181818,
      "latitude": 50.687122,
      "type": "gps",
      "timestamp": 1487.922692418098,
      "longitude": 17.985046
    },
    {
      "altitude": 155.9090909090909,
      "latitude": 50.687182,
      "type": "gps",
      "timestamp": 1491.929240643978,
      "longitude": 17.984913
    },
    {
      "altitude": 156,
      "latitude": 50.687239,
      "type": "gps",
      "timestamp": 1495.926039397717,
      "longitude": 17.984782
    },
    {
      "altitude": 156.0909090909091,
      "latitude": 50.687293,
      "type": "gps",
      "timestamp": 1499.927619576454,
      "longitude": 17.984659
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.687358,
      "type": "gps",
      "timestamp": 1504.924838006496,
      "longitude": 17.984514
    },
    {
      "altitude": 156.27272727272728,
      "latitude": 50.687411,
      "type": "gps",
      "timestamp": 1508.891583800316,
      "longitude": 17.984391
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.687471,
      "type": "gps",
      "timestamp": 1513.882405221462,
      "longitude": 17.984244
    },
    {
      "altitude": 156.0909090909091,
      "latitude": 50.687526,
      "type": "gps",
      "timestamp": 1518.922646284103,
      "longitude": 17.984098
    },
    {
      "altitude": 156,
      "latitude": 50.687574,
      "type": "gps",
      "timestamp": 1522.904565989971,
      "longitude": 17.983977
    },
    {
      "altitude": 156,
      "latitude": 50.687625,
      "type": "gps",
      "timestamp": 1526.892728686333,
      "longitude": 17.983855
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.687683,
      "type": "gps",
      "timestamp": 1531.935112893581,
      "longitude": 17.983711
    },
    {
      "altitude": 156.36363636363637,
      "latitude": 50.687734,
      "type": "gps",
      "timestamp": 1535.919998764992,
      "longitude": 17.98359
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.687786,
      "type": "gps",
      "timestamp": 1539.890627980232,
      "longitude": 17.983472
    },
    {
      "altitude": 156.54545454545453,
      "latitude": 50.687832,
      "type": "gps",
      "timestamp": 1543.917166113853,
      "longitude": 17.983342
    },
    {
      "altitude": 156.63636363636363,
      "latitude": 50.687885,
      "type": "gps",
      "timestamp": 1547.928189814091,
      "longitude": 17.983208
    },
    {
      "altitude": 156.72727272727272,
      "latitude": 50.687931,
      "type": "gps",
      "timestamp": 1551.907247841358,
      "longitude": 17.983086
    },
    {
      "altitude": 156.8181818181818,
      "latitude": 50.687989,
      "type": "gps",
      "timestamp": 1556.927769720554,
      "longitude": 17.982934
    },
    {
      "altitude": 156.9090909090909,
      "latitude": 50.688035,
      "type": "gps",
      "timestamp": 1560.926428258419,
      "longitude": 17.982808
    },
    {
      "altitude": 156.9090909090909,
      "latitude": 50.688091,
      "type": "gps",
      "timestamp": 1565.919342398643,
      "longitude": 17.982656
    },
    {
      "altitude": 156.9090909090909,
      "latitude": 50.688144,
      "type": "gps",
      "timestamp": 1570.922997117043,
      "longitude": 17.982503
    },
    {
      "altitude": 156.9090909090909,
      "latitude": 50.688186,
      "type": "gps",
      "timestamp": 1574.877024769783,
      "longitude": 17.982377
    },
    {
      "altitude": 156.72727272727272,
      "latitude": 50.68823,
      "type": "gps",
      "timestamp": 1578.918944239616,
      "longitude": 17.98225
    },
    {
      "altitude": 156.54545454545453,
      "latitude": 50.688276,
      "type": "gps",
      "timestamp": 1582.899214148521,
      "longitude": 17.982121
    },
    {
      "altitude": 156.36363636363637,
      "latitude": 50.688325,
      "type": "gps",
      "timestamp": 1586.889399528503,
      "longitude": 17.981997
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.688366,
      "type": "gps",
      "timestamp": 1590.919196784496,
      "longitude": 17.981865
    },
    {
      "altitude": 156,
      "latitude": 50.688413,
      "type": "gps",
      "timestamp": 1595.890011608601,
      "longitude": 17.981707
    },
    {
      "altitude": 155.8181818181818,
      "latitude": 50.688465,
      "type": "gps",
      "timestamp": 1600.895663559437,
      "longitude": 17.981548
    },
    {
      "altitude": 155.63636363636363,
      "latitude": 50.688514,
      "type": "gps",
      "timestamp": 1605.884543895721,
      "longitude": 17.98139
    },
    {
      "altitude": 155.45454545454547,
      "latitude": 50.688562,
      "type": "gps",
      "timestamp": 1610.885698497295,
      "longitude": 17.981234
    },
    {
      "altitude": 155.36363636363637,
      "latitude": 50.688603,
      "type": "gps",
      "timestamp": 1614.919607996941,
      "longitude": 17.981098
    },
    {
      "altitude": 155.63636363636363,
      "latitude": 50.688636,
      "type": "gps",
      "timestamp": 1618.901965081692,
      "longitude": 17.980964
    },
    {
      "altitude": 155.9090909090909,
      "latitude": 50.688678,
      "type": "gps",
      "timestamp": 1622.910733163357,
      "longitude": 17.980838
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.688712,
      "type": "gps",
      "timestamp": 1626.913492679596,
      "longitude": 17.980704
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.688758,
      "type": "gps",
      "timestamp": 1631.924681842327,
      "longitude": 17.98054
    },
    {
      "altitude": 156.8181818181818,
      "latitude": 50.688797,
      "type": "gps",
      "timestamp": 1635.892295181751,
      "longitude": 17.980403
    },
    {
      "altitude": 156.9090909090909,
      "latitude": 50.688836,
      "type": "gps",
      "timestamp": 1639.919776856899,
      "longitude": 17.980257
    },
    {
      "altitude": 157,
      "latitude": 50.688874,
      "type": "gps",
      "timestamp": 1643.944698810577,
      "longitude": 17.980112
    },
    {
      "altitude": 157.0909090909091,
      "latitude": 50.688907,
      "type": "gps",
      "timestamp": 1647.893558502197,
      "longitude": 17.97997
    },
    {
      "altitude": 157.1818181818182,
      "latitude": 50.688934,
      "type": "gps",
      "timestamp": 1651.900757730007,
      "longitude": 17.979826
    },
    {
      "altitude": 157.27272727272728,
      "latitude": 50.688965,
      "type": "gps",
      "timestamp": 1655.941224575043,
      "longitude": 17.979689
    },
    {
      "altitude": 157.36363636363637,
      "latitude": 50.689002,
      "type": "gps",
      "timestamp": 1659.889593720436,
      "longitude": 17.979553
    },
    {
      "altitude": 156.9090909090909,
      "latitude": 50.689035,
      "type": "gps",
      "timestamp": 1663.922271311283,
      "longitude": 17.97942
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.689069,
      "type": "gps",
      "timestamp": 1667.921068549156,
      "longitude": 17.979281
    },
    {
      "altitude": 156,
      "latitude": 50.689106,
      "type": "gps",
      "timestamp": 1671.917457580566,
      "longitude": 17.979148
    },
    {
      "altitude": 155.54545454545453,
      "latitude": 50.689141,
      "type": "gps",
      "timestamp": 1675.888138830662,
      "longitude": 17.979009
    },
    {
      "altitude": 155.0909090909091,
      "latitude": 50.689174,
      "type": "gps",
      "timestamp": 1679.907979667187,
      "longitude": 17.978868
    },
    {
      "altitude": 154.8181818181818,
      "latitude": 50.689175,
      "type": "gps",
      "timestamp": 1684.92837035656,
      "longitude": 17.978706
    },
    {
      "altitude": 154.54545454545453,
      "latitude": 50.689223,
      "type": "gps",
      "timestamp": 1689.925935387611,
      "longitude": 17.978549
    },
    {
      "altitude": 154.27272727272728,
      "latitude": 50.689272,
      "type": "gps",
      "timestamp": 1693.928976714611,
      "longitude": 17.978428
    },
    {
      "altitude": 154,
      "latitude": 50.689306,
      "type": "gps",
      "timestamp": 1698.923368394375,
      "longitude": 17.978266
    },
    {
      "altitude": 153.72727272727272,
      "latitude": 50.68934,
      "type": "gps",
      "timestamp": 1703.89059227705,
      "longitude": 17.978105
    },
    {
      "altitude": 153.45454545454547,
      "latitude": 50.689349,
      "type": "gps",
      "timestamp": 1708.911204338074,
      "longitude": 17.977946
    },
    {
      "altitude": 153.36363636363637,
      "latitude": 50.689396,
      "type": "gps",
      "timestamp": 1713.92231631279,
      "longitude": 17.977788
    },
    {
      "altitude": 153.27272727272728,
      "latitude": 50.689424,
      "type": "gps",
      "timestamp": 1717.919975578785,
      "longitude": 17.977649
    },
    {
      "altitude": 153.1818181818182,
      "latitude": 50.689451,
      "type": "gps",
      "timestamp": 1721.891782104969,
      "longitude": 17.977502
    },
    {
      "altitude": 153.0909090909091,
      "latitude": 50.689479,
      "type": "gps",
      "timestamp": 1725.8972150087359,
      "longitude": 17.97736
    },
    {
      "altitude": 153,
      "latitude": 50.689508,
      "type": "gps",
      "timestamp": 1729.911449730396,
      "longitude": 17.977218
    },
    {
      "altitude": 153,
      "latitude": 50.689535,
      "type": "gps",
      "timestamp": 1733.924409329891,
      "longitude": 17.977081
    },
    {
      "altitude": 153,
      "latitude": 50.689568,
      "type": "gps",
      "timestamp": 1737.922340869904,
      "longitude": 17.97694
    },
    {
      "altitude": 153,
      "latitude": 50.689606,
      "type": "gps",
      "timestamp": 1742.924727797508,
      "longitude": 17.976775
    },
    {
      "altitude": 153,
      "latitude": 50.689636,
      "type": "gps",
      "timestamp": 1746.933353185654,
      "longitude": 17.976638
    },
    {
      "altitude": 153,
      "latitude": 50.689663,
      "type": "gps",
      "timestamp": 1750.901147425175,
      "longitude": 17.9765
    },
    {
      "altitude": 153,
      "latitude": 50.689692,
      "type": "gps",
      "timestamp": 1754.928895175457,
      "longitude": 17.976361
    },
    {
      "altitude": 153,
      "latitude": 50.689723,
      "type": "gps",
      "timestamp": 1758.920034408569,
      "longitude": 17.976222
    },
    {
      "altitude": 153,
      "latitude": 50.689753,
      "type": "gps",
      "timestamp": 1762.919461786747,
      "longitude": 17.976085
    },
    {
      "altitude": 153,
      "latitude": 50.689786,
      "type": "gps",
      "timestamp": 1766.896259129047,
      "longitude": 17.975944
    },
    {
      "altitude": 153,
      "latitude": 50.689818,
      "type": "gps",
      "timestamp": 1770.887704968452,
      "longitude": 17.9758
    },
    {
      "altitude": 153,
      "latitude": 50.689847,
      "type": "gps",
      "timestamp": 1774.901829600334,
      "longitude": 17.975657
    },
    {
      "altitude": 153,
      "latitude": 50.689876,
      "type": "gps",
      "timestamp": 1778.893050372601,
      "longitude": 17.975515
    },
    {
      "altitude": 152.9090909090909,
      "latitude": 50.689909,
      "type": "gps",
      "timestamp": 1782.889064192772,
      "longitude": 17.975381
    },
    {
      "altitude": 152.8181818181818,
      "latitude": 50.689947,
      "type": "gps",
      "timestamp": 1786.919798195362,
      "longitude": 17.975248
    },
    {
      "altitude": 152.72727272727272,
      "latitude": 50.689975,
      "type": "gps",
      "timestamp": 1790.91950327158,
      "longitude": 17.975108
    },
    {
      "altitude": 152.63636363636363,
      "latitude": 50.690007,
      "type": "gps",
      "timestamp": 1794.901526629925,
      "longitude": 17.974973
    },
    {
      "altitude": 152.54545454545453,
      "latitude": 50.690041,
      "type": "gps",
      "timestamp": 1798.897496521473,
      "longitude": 17.974838
    },
    {
      "altitude": 152.45454545454547,
      "latitude": 50.690077,
      "type": "gps",
      "timestamp": 1802.896875619888,
      "longitude": 17.974698
    },
    {
      "altitude": 152.36363636363637,
      "latitude": 50.690111,
      "type": "gps",
      "timestamp": 1806.892506837845,
      "longitude": 17.974561
    },
    {
      "altitude": 152.27272727272728,
      "latitude": 50.690147,
      "type": "gps",
      "timestamp": 1810.921340823174,
      "longitude": 17.974423
    },
    {
      "altitude": 152.1818181818182,
      "latitude": 50.690183,
      "type": "gps",
      "timestamp": 1814.909863114357,
      "longitude": 17.974286
    },
    {
      "altitude": 152.0909090909091,
      "latitude": 50.690216,
      "type": "gps",
      "timestamp": 1818.902191579342,
      "longitude": 17.974148
    },
    {
      "altitude": 152.27272727272728,
      "latitude": 50.69026,
      "type": "gps",
      "timestamp": 1822.903841078281,
      "longitude": 17.973997
    },
    {
      "altitude": 152.54545454545453,
      "latitude": 50.690302,
      "type": "gps",
      "timestamp": 1826.895632147789,
      "longitude": 17.973858
    },
    {
      "altitude": 152.8181818181818,
      "latitude": 50.690339,
      "type": "gps",
      "timestamp": 1830.921852767467,
      "longitude": 17.973723
    },
    {
      "altitude": 153,
      "latitude": 50.690382,
      "type": "gps",
      "timestamp": 1834.926471054554,
      "longitude": 17.973586
    },
    {
      "altitude": 153.1818181818182,
      "latitude": 50.69042,
      "type": "gps",
      "timestamp": 1838.888351738453,
      "longitude": 17.973452
    },
    {
      "altitude": 153.36363636363637,
      "latitude": 50.690476,
      "type": "gps",
      "timestamp": 1842.900708854198,
      "longitude": 17.973306
    },
    {
      "altitude": 153.54545454545453,
      "latitude": 50.690522,
      "type": "gps",
      "timestamp": 1847.892800688744,
      "longitude": 17.973148
    },
    {
      "altitude": 153.72727272727272,
      "latitude": 50.690562,
      "type": "gps",
      "timestamp": 1852.93247127533,
      "longitude": 17.972998
    },
    {
      "altitude": 153.9090909090909,
      "latitude": 50.690593,
      "type": "gps",
      "timestamp": 1856.926319420338,
      "longitude": 17.972862
    },
    {
      "altitude": 154.0909090909091,
      "latitude": 50.690628,
      "type": "gps",
      "timestamp": 1860.917481839657,
      "longitude": 17.972731
    },
    {
      "altitude": 154.27272727272728,
      "latitude": 50.690669,
      "type": "gps",
      "timestamp": 1864.9264960289,
      "longitude": 17.972599
    },
    {
      "altitude": 154.1818181818182,
      "latitude": 50.690711,
      "type": "gps",
      "timestamp": 1868.888615965843,
      "longitude": 17.972464
    },
    {
      "altitude": 154.0909090909091,
      "latitude": 50.690755,
      "type": "gps",
      "timestamp": 1872.891010463238,
      "longitude": 17.972337
    },
    {
      "altitude": 154,
      "latitude": 50.690799,
      "type": "gps",
      "timestamp": 1876.928806364536,
      "longitude": 17.972211
    },
    {
      "altitude": 154,
      "latitude": 50.690836,
      "type": "gps",
      "timestamp": 1880.930052518845,
      "longitude": 17.972078
    },
    {
      "altitude": 154.0909090909091,
      "latitude": 50.690882,
      "type": "gps",
      "timestamp": 1884.915949225426,
      "longitude": 17.971945
    },
    {
      "altitude": 154.1818181818182,
      "latitude": 50.690929,
      "type": "gps",
      "timestamp": 1888.897372245789,
      "longitude": 17.971813
    },
    {
      "altitude": 154.27272727272728,
      "latitude": 50.690973,
      "type": "gps",
      "timestamp": 1892.925562679768,
      "longitude": 17.971677
    },
    {
      "altitude": 154.36363636363637,
      "latitude": 50.691016,
      "type": "gps",
      "timestamp": 1896.92419308424,
      "longitude": 17.971543
    },
    {
      "altitude": 154.36363636363637,
      "latitude": 50.691057,
      "type": "gps",
      "timestamp": 1900.892771720886,
      "longitude": 17.971414
    },
    {
      "altitude": 154.36363636363637,
      "latitude": 50.691102,
      "type": "gps",
      "timestamp": 1904.920838832855,
      "longitude": 17.971281
    },
    {
      "altitude": 154.27272727272728,
      "latitude": 50.691142,
      "type": "gps",
      "timestamp": 1908.936635613441,
      "longitude": 17.971146
    },
    {
      "altitude": 154.1818181818182,
      "latitude": 50.691203,
      "type": "gps",
      "timestamp": 1913.896061837673,
      "longitude": 17.970999
    },
    {
      "altitude": 154.0909090909091,
      "latitude": 50.691255,
      "type": "gps",
      "timestamp": 1918.895281970501,
      "longitude": 17.970848
    },
    {
      "altitude": 154,
      "latitude": 50.691307,
      "type": "gps",
      "timestamp": 1923.892295360565,
      "longitude": 17.970698
    },
    {
      "altitude": 153.9090909090909,
      "latitude": 50.69136,
      "type": "gps",
      "timestamp": 1928.89109402895,
      "longitude": 17.970542
    },
    {
      "altitude": 153.72727272727272,
      "latitude": 50.691405,
      "type": "gps",
      "timestamp": 1932.896072208881,
      "longitude": 17.970418
    },
    {
      "altitude": 153.63636363636363,
      "latitude": 50.691459,
      "type": "gps",
      "timestamp": 1937.893539011478,
      "longitude": 17.970262
    },
    {
      "altitude": 153.54545454545453,
      "latitude": 50.691505,
      "type": "gps",
      "timestamp": 1941.896839797497,
      "longitude": 17.970136
    },
    {
      "altitude": 153.45454545454547,
      "latitude": 50.691554,
      "type": "gps",
      "timestamp": 1945.884829521179,
      "longitude": 17.97
    },
    {
      "altitude": 153.45454545454547,
      "latitude": 50.6916,
      "type": "gps",
      "timestamp": 1949.899328231812,
      "longitude": 17.969867
    },
    {
      "altitude": 153.45454545454547,
      "latitude": 50.691649,
      "type": "gps",
      "timestamp": 1953.886784851551,
      "longitude": 17.969735
    },
    {
      "altitude": 153.54545454545453,
      "latitude": 50.691705,
      "type": "gps",
      "timestamp": 1957.902753591537,
      "longitude": 17.969594
    },
    {
      "altitude": 153.72727272727272,
      "latitude": 50.691761,
      "type": "gps",
      "timestamp": 1961.919840157032,
      "longitude": 17.969463
    },
    {
      "altitude": 153.9090909090909,
      "latitude": 50.691806,
      "type": "gps",
      "timestamp": 1965.897062838078,
      "longitude": 17.969322
    },
    {
      "altitude": 154.0909090909091,
      "latitude": 50.69185,
      "type": "gps",
      "timestamp": 1969.897639036179,
      "longitude": 17.969189
    },
    {
      "altitude": 154.27272727272728,
      "latitude": 50.691897,
      "type": "gps",
      "timestamp": 1973.913675606251,
      "longitude": 17.969057
    },
    {
      "altitude": 154.45454545454547,
      "latitude": 50.691946,
      "type": "gps",
      "timestamp": 1977.9233314991,
      "longitude": 17.968936
    },
    {
      "altitude": 154.54545454545453,
      "latitude": 50.691995,
      "type": "gps",
      "timestamp": 1981.919827461243,
      "longitude": 17.968815
    },
    {
      "altitude": 154.72727272727272,
      "latitude": 50.692052,
      "type": "gps",
      "timestamp": 1986.916871011257,
      "longitude": 17.968666
    },
    {
      "altitude": 154.9090909090909,
      "latitude": 50.692111,
      "type": "gps",
      "timestamp": 1991.887444913387,
      "longitude": 17.968525
    },
    {
      "altitude": 155.0909090909091,
      "latitude": 50.692154,
      "type": "gps",
      "timestamp": 1996.933092832565,
      "longitude": 17.968373
    },
    {
      "altitude": 155.27272727272728,
      "latitude": 50.692211,
      "type": "gps",
      "timestamp": 2001.925038695335,
      "longitude": 17.968238
    },
    {
      "altitude": 155.45454545454547,
      "latitude": 50.692261,
      "type": "gps",
      "timestamp": 2006.902372658253,
      "longitude": 17.968085
    },
    {
      "altitude": 155.54545454545453,
      "latitude": 50.692332,
      "type": "gps",
      "timestamp": 2011.923966944218,
      "longitude": 17.967954
    },
    {
      "altitude": 155.63636363636363,
      "latitude": 50.692394,
      "type": "gps",
      "timestamp": 2016.920776486397,
      "longitude": 17.967811
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.692448,
      "type": "gps",
      "timestamp": 2020.887184202671,
      "longitude": 17.967689
    },
    {
      "altitude": 155.8181818181818,
      "latitude": 50.6925,
      "type": "gps",
      "timestamp": 2024.916088044643,
      "longitude": 17.967563
    },
    {
      "altitude": 155.9090909090909,
      "latitude": 50.692555,
      "type": "gps",
      "timestamp": 2028.912507236004,
      "longitude": 17.967436
    },
    {
      "altitude": 156,
      "latitude": 50.692612,
      "type": "gps",
      "timestamp": 2032.900577068329,
      "longitude": 17.967306
    },
    {
      "altitude": 156,
      "latitude": 50.692669,
      "type": "gps",
      "timestamp": 2036.886105537415,
      "longitude": 17.967176
    },
    {
      "altitude": 155.8181818181818,
      "latitude": 50.692717,
      "type": "gps",
      "timestamp": 2040.889725506306,
      "longitude": 17.967045
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.692767,
      "type": "gps",
      "timestamp": 2044.886184811592,
      "longitude": 17.966917
    },
    {
      "altitude": 155.63636363636363,
      "latitude": 50.692815,
      "type": "gps",
      "timestamp": 2048.890691459179,
      "longitude": 17.966789
    },
    {
      "altitude": 155.54545454545453,
      "latitude": 50.692859,
      "type": "gps",
      "timestamp": 2052.889363408089,
      "longitude": 17.966664
    },
    {
      "altitude": 155.45454545454547,
      "latitude": 50.69291,
      "type": "gps",
      "timestamp": 2056.9133066535,
      "longitude": 17.966534
    },
    {
      "altitude": 155.36363636363637,
      "latitude": 50.692962,
      "type": "gps",
      "timestamp": 2060.91937571764,
      "longitude": 17.966401
    },
    {
      "altitude": 155.27272727272728,
      "latitude": 50.693013,
      "type": "gps",
      "timestamp": 2064.8937693238263,
      "longitude": 17.966268
    },
    {
      "altitude": 155.1818181818182,
      "latitude": 50.693062,
      "type": "gps",
      "timestamp": 2068.888647377491,
      "longitude": 17.966139
    },
    {
      "altitude": 155.0909090909091,
      "latitude": 50.693106,
      "type": "gps",
      "timestamp": 2072.892243802547,
      "longitude": 17.966012
    },
    {
      "altitude": 155,
      "latitude": 50.693162,
      "type": "gps",
      "timestamp": 2076.8911681175227,
      "longitude": 17.965883
    },
    {
      "altitude": 154.9090909090909,
      "latitude": 50.693217,
      "type": "gps",
      "timestamp": 2080.9015756249432,
      "longitude": 17.965754
    },
    {
      "altitude": 155,
      "latitude": 50.69327,
      "type": "gps",
      "timestamp": 2084.892736911774,
      "longitude": 17.96562
    },
    {
      "altitude": 155,
      "latitude": 50.693319,
      "type": "gps",
      "timestamp": 2088.893942177296,
      "longitude": 17.965495
    },
    {
      "altitude": 155,
      "latitude": 50.693372,
      "type": "gps",
      "timestamp": 2092.894351124763,
      "longitude": 17.965363
    },
    {
      "altitude": 155.0909090909091,
      "latitude": 50.693426,
      "type": "gps",
      "timestamp": 2096.882045686245,
      "longitude": 17.965232
    },
    {
      "altitude": 155.1818181818182,
      "latitude": 50.693485,
      "type": "gps",
      "timestamp": 2100.919373214245,
      "longitude": 17.965109
    },
    {
      "altitude": 155.27272727272728,
      "latitude": 50.693568,
      "type": "gps",
      "timestamp": 2104.901613116264,
      "longitude": 17.965005
    },
    {
      "altitude": 155.36363636363637,
      "latitude": 50.693656,
      "type": "gps",
      "timestamp": 2108.918253064156,
      "longitude": 17.964921
    },
    {
      "altitude": 155.45454545454547,
      "latitude": 50.693727,
      "type": "gps",
      "timestamp": 2112.88045156002,
      "longitude": 17.964806
    },
    {
      "altitude": 155.54545454545453,
      "latitude": 50.693773,
      "type": "gps",
      "timestamp": 2116.924397110939,
      "longitude": 17.96467
    },
    {
      "altitude": 155.63636363636363,
      "latitude": 50.693819,
      "type": "gps",
      "timestamp": 2120.917741537094,
      "longitude": 17.964532
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.693862,
      "type": "gps",
      "timestamp": 2124.898984670639,
      "longitude": 17.964401
    },
    {
      "altitude": 155.9090909090909,
      "latitude": 50.693907,
      "type": "gps",
      "timestamp": 2128.893369793892,
      "longitude": 17.964264
    },
    {
      "altitude": 156.0909090909091,
      "latitude": 50.693964,
      "type": "gps",
      "timestamp": 2132.912179768085,
      "longitude": 17.964137
    },
    {
      "altitude": 156.27272727272728,
      "latitude": 50.694025,
      "type": "gps",
      "timestamp": 2136.925755560398,
      "longitude": 17.964013
    },
    {
      "altitude": 156.36363636363637,
      "latitude": 50.694075,
      "type": "gps",
      "timestamp": 2140.924966096878,
      "longitude": 17.96389
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.694123,
      "type": "gps",
      "timestamp": 2144.919701755047,
      "longitude": 17.963763
    },
    {
      "altitude": 156.54545454545453,
      "latitude": 50.694173,
      "type": "gps",
      "timestamp": 2148.92262160778,
      "longitude": 17.963639
    },
    {
      "altitude": 156.63636363636363,
      "latitude": 50.694225,
      "type": "gps",
      "timestamp": 2152.915518820286,
      "longitude": 17.963515
    },
    {
      "altitude": 156.72727272727272,
      "latitude": 50.694277,
      "type": "gps",
      "timestamp": 2156.900897026062,
      "longitude": 17.963387
    },
    {
      "altitude": 156.8181818181818,
      "latitude": 50.694323,
      "type": "gps",
      "timestamp": 2161.921188771725,
      "longitude": 17.963249
    },
    {
      "altitude": 156.9090909090909,
      "latitude": 50.694366,
      "type": "gps",
      "timestamp": 2168.922458827496,
      "longitude": 17.963103
    },
    {
      "altitude": 157,
      "latitude": 50.694286,
      "type": "gps",
      "timestamp": 2238.878344774246,
      "longitude": 17.963178
    },
    {
      "altitude": 156.9090909090909,
      "latitude": 50.694364,
      "type": "gps",
      "timestamp": 2290.896037697792,
      "longitude": 17.963253
    },
    {
      "altitude": 156.8181818181818,
      "latitude": 50.694292,
      "type": "gps",
      "timestamp": 2299.894375026226,
      "longitude": 17.963368
    },
    {
      "altitude": 156.72727272727272,
      "latitude": 50.694218,
      "type": "gps",
      "timestamp": 2304.890914022923,
      "longitude": 17.963499
    },
    {
      "altitude": 156.63636363636363,
      "latitude": 50.69417,
      "type": "gps",
      "timestamp": 2308.918181598186,
      "longitude": 17.963629
    },
    {
      "altitude": 156.54545454545453,
      "latitude": 50.694124,
      "type": "gps",
      "timestamp": 2312.913888275623,
      "longitude": 17.963754
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.694078,
      "type": "gps",
      "timestamp": 2316.908087849617,
      "longitude": 17.96388
    },
    {
      "altitude": 156.36363636363637,
      "latitude": 50.69402,
      "type": "gps",
      "timestamp": 2320.893743574619,
      "longitude": 17.963998
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.69397,
      "type": "gps",
      "timestamp": 2324.892386436462,
      "longitude": 17.964125
    },
    {
      "altitude": 156,
      "latitude": 50.693924,
      "type": "gps",
      "timestamp": 2328.876682698727,
      "longitude": 17.964264
    },
    {
      "altitude": 155.8181818181818,
      "latitude": 50.693867,
      "type": "gps",
      "timestamp": 2333.898149847984,
      "longitude": 17.964412
    },
    {
      "altitude": 155.63636363636363,
      "latitude": 50.693801,
      "type": "gps",
      "timestamp": 2338.89308488369,
      "longitude": 17.964557
    },
    {
      "altitude": 155.54545454545453,
      "latitude": 50.693732,
      "type": "gps",
      "timestamp": 2342.919181108475,
      "longitude": 17.96467
    },
    {
      "altitude": 155.45454545454547,
      "latitude": 50.693684,
      "type": "gps",
      "timestamp": 2346.928494572639,
      "longitude": 17.964792
    },
    {
      "altitude": 155.36363636363637,
      "latitude": 50.693624,
      "type": "gps",
      "timestamp": 2351.889700889587,
      "longitude": 17.964936
    },
    {
      "altitude": 155.27272727272728,
      "latitude": 50.693536,
      "type": "gps",
      "timestamp": 2356.900125145912,
      "longitude": 17.96503
    },
    {
      "altitude": 155.1818181818182,
      "latitude": 50.693449,
      "type": "gps",
      "timestamp": 2361.899728894234,
      "longitude": 17.965141
    },
    {
      "altitude": 155.0909090909091,
      "latitude": 50.6934,
      "type": "gps",
      "timestamp": 2365.886235415936,
      "longitude": 17.965263
    },
    {
      "altitude": 155,
      "latitude": 50.693347,
      "type": "gps",
      "timestamp": 2370.88161867857,
      "longitude": 17.965415
    },
    {
      "altitude": 155,
      "latitude": 50.69329,
      "type": "gps",
      "timestamp": 2375.900686562061,
      "longitude": 17.965563
    },
    {
      "altitude": 154.9090909090909,
      "latitude": 50.693229,
      "type": "gps",
      "timestamp": 2380.889926493168,
      "longitude": 17.965707
    },
    {
      "altitude": 155,
      "latitude": 50.693178,
      "type": "gps",
      "timestamp": 2384.917076230049,
      "longitude": 17.965825
    },
    {
      "altitude": 155.0909090909091,
      "latitude": 50.693128,
      "type": "gps",
      "timestamp": 2388.925967514515,
      "longitude": 17.965945
    },
    {
      "altitude": 155.1818181818182,
      "latitude": 50.69307,
      "type": "gps",
      "timestamp": 2393.890475988388,
      "longitude": 17.966091
    },
    {
      "altitude": 155.27272727272728,
      "latitude": 50.693009,
      "type": "gps",
      "timestamp": 2398.886454045773,
      "longitude": 17.966239
    },
    {
      "altitude": 155.36363636363637,
      "latitude": 50.692962,
      "type": "gps",
      "timestamp": 2402.890943467617,
      "longitude": 17.966363
    },
    {
      "altitude": 155.45454545454547,
      "latitude": 50.692914,
      "type": "gps",
      "timestamp": 2406.892722308636,
      "longitude": 17.966488
    },
    {
      "altitude": 155.54545454545453,
      "latitude": 50.692865,
      "type": "gps",
      "timestamp": 2410.908569872379,
      "longitude": 17.966614
    },
    {
      "altitude": 155.63636363636363,
      "latitude": 50.69281,
      "type": "gps",
      "timestamp": 2414.892112255096,
      "longitude": 17.966738
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.692756,
      "type": "gps",
      "timestamp": 2418.88504332304,
      "longitude": 17.96687
    },
    {
      "altitude": 155.8181818181818,
      "latitude": 50.692704,
      "type": "gps",
      "timestamp": 2422.8907399773598,
      "longitude": 17.966997
    },
    {
      "altitude": 156,
      "latitude": 50.692655,
      "type": "gps",
      "timestamp": 2426.889937102795,
      "longitude": 17.967121
    },
    {
      "altitude": 156,
      "latitude": 50.692595,
      "type": "gps",
      "timestamp": 2431.891259372234,
      "longitude": 17.967273
    },
    {
      "altitude": 155.9090909090909,
      "latitude": 50.692536,
      "type": "gps",
      "timestamp": 2436.912626743317,
      "longitude": 17.967421
    },
    {
      "altitude": 155.8181818181818,
      "latitude": 50.692483,
      "type": "gps",
      "timestamp": 2440.915298819542,
      "longitude": 17.967542
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.692432,
      "type": "gps",
      "timestamp": 2444.936233699322,
      "longitude": 17.967666
    },
    {
      "altitude": 155.63636363636363,
      "latitude": 50.69238,
      "type": "gps",
      "timestamp": 2448.922052681446,
      "longitude": 17.967793
    },
    {
      "altitude": 155.54545454545453,
      "latitude": 50.692328,
      "type": "gps",
      "timestamp": 2452.900231003761,
      "longitude": 17.967917
    },
    {
      "altitude": 155.45454545454547,
      "latitude": 50.692272,
      "type": "gps",
      "timestamp": 2456.918475329876,
      "longitude": 17.968032
    },
    {
      "altitude": 155.27272727272728,
      "latitude": 50.692215,
      "type": "gps",
      "timestamp": 2461.914364397526,
      "longitude": 17.968182
    },
    {
      "altitude": 155.0909090909091,
      "latitude": 50.692168,
      "type": "gps",
      "timestamp": 2465.894702017307,
      "longitude": 17.96831
    },
    {
      "altitude": 154.9090909090909,
      "latitude": 50.692121,
      "type": "gps",
      "timestamp": 2469.8836541175842,
      "longitude": 17.968435
    },
    {
      "altitude": 154.72727272727272,
      "latitude": 50.69206,
      "type": "gps",
      "timestamp": 2474.929720282555,
      "longitude": 17.968585
    },
    {
      "altitude": 154.54545454545453,
      "latitude": 50.692007,
      "type": "gps",
      "timestamp": 2478.925817430019,
      "longitude": 17.9687
    },
    {
      "altitude": 154.45454545454547,
      "latitude": 50.69195,
      "type": "gps",
      "timestamp": 2483.883401751518,
      "longitude": 17.96885
    },
    {
      "altitude": 154.36363636363637,
      "latitude": 50.691904,
      "type": "gps",
      "timestamp": 2487.8881330490112,
      "longitude": 17.968979
    },
    {
      "altitude": 154.1818181818182,
      "latitude": 50.691856,
      "type": "gps",
      "timestamp": 2491.89282566309,
      "longitude": 17.969111
    },
    {
      "altitude": 154,
      "latitude": 50.691804,
      "type": "gps",
      "timestamp": 2495.89258146286,
      "longitude": 17.969246
    },
    {
      "altitude": 153.8181818181818,
      "latitude": 50.691755,
      "type": "gps",
      "timestamp": 2499.884670376778,
      "longitude": 17.96937
    },
    {
      "altitude": 153.63636363636363,
      "latitude": 50.691711,
      "type": "gps",
      "timestamp": 2503.918229937553,
      "longitude": 17.969499
    },
    {
      "altitude": 153.54545454545453,
      "latitude": 50.691662,
      "type": "gps",
      "timestamp": 2507.920765936375,
      "longitude": 17.969629
    },
    {
      "altitude": 153.45454545454547,
      "latitude": 50.691609,
      "type": "gps",
      "timestamp": 2511.903276324272,
      "longitude": 17.969755
    },
    {
      "altitude": 153.45454545454547,
      "latitude": 50.691562,
      "type": "gps",
      "timestamp": 2515.887062430382,
      "longitude": 17.969877
    },
    {
      "altitude": 153.54545454545453,
      "latitude": 50.691515,
      "type": "gps",
      "timestamp": 2519.902082264423,
      "longitude": 17.97
    },
    {
      "altitude": 153.63636363636363,
      "latitude": 50.691456,
      "type": "gps",
      "timestamp": 2524.920518994331,
      "longitude": 17.970152
    },
    {
      "altitude": 153.72727272727272,
      "latitude": 50.691399,
      "type": "gps",
      "timestamp": 2529.892596065998,
      "longitude": 17.970302
    },
    {
      "altitude": 153.8181818181818,
      "latitude": 50.691344,
      "type": "gps",
      "timestamp": 2534.895526885986,
      "longitude": 17.970457
    },
    {
      "altitude": 154,
      "latitude": 50.691291,
      "type": "gps",
      "timestamp": 2539.889011144638,
      "longitude": 17.970608
    },
    {
      "altitude": 154.0909090909091,
      "latitude": 50.691247,
      "type": "gps",
      "timestamp": 2543.886962473392,
      "longitude": 17.970735
    },
    {
      "altitude": 154.1818181818182,
      "latitude": 50.691197,
      "type": "gps",
      "timestamp": 2547.884338915348,
      "longitude": 17.970856
    },
    {
      "altitude": 154.27272727272728,
      "latitude": 50.691144,
      "type": "gps",
      "timestamp": 2551.888214826584,
      "longitude": 17.970981
    },
    {
      "altitude": 154.36363636363637,
      "latitude": 50.6911,
      "type": "gps",
      "timestamp": 2555.886719882488,
      "longitude": 17.971109
    },
    {
      "altitude": 154.45454545454547,
      "latitude": 50.691052,
      "type": "gps",
      "timestamp": 2559.889789164066,
      "longitude": 17.971235
    },
    {
      "altitude": 154.45454545454547,
      "latitude": 50.690995,
      "type": "gps",
      "timestamp": 2564.918040454388,
      "longitude": 17.97139
    },
    {
      "altitude": 154.36363636363637,
      "latitude": 50.690955,
      "type": "gps",
      "timestamp": 2568.91397947073,
      "longitude": 17.971523
    },
    {
      "altitude": 154.27272727272728,
      "latitude": 50.690914,
      "type": "gps",
      "timestamp": 2572.924635827541,
      "longitude": 17.971652
    },
    {
      "altitude": 154.1818181818182,
      "latitude": 50.690874,
      "type": "gps",
      "timestamp": 2576.887848854065,
      "longitude": 17.971786
    },
    {
      "altitude": 154.0909090909091,
      "latitude": 50.690826,
      "type": "gps",
      "timestamp": 2580.911256432533,
      "longitude": 17.971911
    },
    {
      "altitude": 154,
      "latitude": 50.690785,
      "type": "gps",
      "timestamp": 2585.891574978828,
      "longitude": 17.972076
    },
    {
      "altitude": 154.0909090909091,
      "latitude": 50.690739,
      "type": "gps",
      "timestamp": 2590.879919588566,
      "longitude": 17.972235
    },
    {
      "altitude": 154.1818181818182,
      "latitude": 50.690712,
      "type": "gps",
      "timestamp": 2594.880304038525,
      "longitude": 17.972372
    },
    {
      "altitude": 154.27272727272728,
      "latitude": 50.690674,
      "type": "gps",
      "timestamp": 2598.892726182938,
      "longitude": 17.972505
    },
    {
      "altitude": 154.0909090909091,
      "latitude": 50.690635,
      "type": "gps",
      "timestamp": 2602.876714468002,
      "longitude": 17.972637
    },
    {
      "altitude": 153.9090909090909,
      "latitude": 50.690586,
      "type": "gps",
      "timestamp": 2607.91267311573,
      "longitude": 17.972797
    },
    {
      "altitude": 153.72727272727272,
      "latitude": 50.690538,
      "type": "gps",
      "timestamp": 2612.886756360531,
      "longitude": 17.972957
    },
    {
      "altitude": 153.54545454545453,
      "latitude": 50.690501,
      "type": "gps",
      "timestamp": 2616.899264335632,
      "longitude": 17.97309
    },
    {
      "altitude": 153.36363636363637,
      "latitude": 50.690461,
      "type": "gps",
      "timestamp": 2620.899353384972,
      "longitude": 17.973224
    },
    {
      "altitude": 153.1818181818182,
      "latitude": 50.690421,
      "type": "gps",
      "timestamp": 2624.935624659061,
      "longitude": 17.973355
    },
    {
      "altitude": 153,
      "latitude": 50.690381,
      "type": "gps",
      "timestamp": 2628.919610440731,
      "longitude": 17.973493
    },
    {
      "altitude": 152.8181818181818,
      "latitude": 50.690347,
      "type": "gps",
      "timestamp": 2632.918439745903,
      "longitude": 17.973625
    },
    {
      "altitude": 152.54545454545453,
      "latitude": 50.690303,
      "type": "gps",
      "timestamp": 2636.882949590683,
      "longitude": 17.973755
    },
    {
      "altitude": 152.27272727272728,
      "latitude": 50.690257,
      "type": "gps",
      "timestamp": 2641.918925464153,
      "longitude": 17.973917
    },
    {
      "altitude": 152.0909090909091,
      "latitude": 50.690218,
      "type": "gps",
      "timestamp": 2645.884328484535,
      "longitude": 17.974048
    },
    {
      "altitude": 152.1818181818182,
      "latitude": 50.690182,
      "type": "gps",
      "timestamp": 2649.872963249683,
      "longitude": 17.974186
    },
    {
      "altitude": 152.27272727272728,
      "latitude": 50.690147,
      "type": "gps",
      "timestamp": 2653.876117527485,
      "longitude": 17.974328
    },
    {
      "altitude": 152.36363636363637,
      "latitude": 50.69011,
      "type": "gps",
      "timestamp": 2657.889051735401,
      "longitude": 17.974466
    },
    {
      "altitude": 152.45454545454547,
      "latitude": 50.690075,
      "type": "gps",
      "timestamp": 2661.858619689941,
      "longitude": 17.974611
    },
    {
      "altitude": 152.54545454545453,
      "latitude": 50.690038,
      "type": "gps",
      "timestamp": 2665.892090857029,
      "longitude": 17.974748
    },
    {
      "altitude": 152.63636363636363,
      "latitude": 50.69,
      "type": "gps",
      "timestamp": 2669.927721440792,
      "longitude": 17.974886
    },
    {
      "altitude": 152.72727272727272,
      "latitude": 50.689966,
      "type": "gps",
      "timestamp": 2673.911604404449,
      "longitude": 17.975025
    },
    {
      "altitude": 152.8181818181818,
      "latitude": 50.689933,
      "type": "gps",
      "timestamp": 2677.916362762451,
      "longitude": 17.975161
    },
    {
      "altitude": 152.9090909090909,
      "latitude": 50.689901,
      "type": "gps",
      "timestamp": 2681.934957623482,
      "longitude": 17.9753
    },
    {
      "altitude": 153,
      "latitude": 50.689875,
      "type": "gps",
      "timestamp": 2685.920740067959,
      "longitude": 17.97545
    },
    {
      "altitude": 153,
      "latitude": 50.689833,
      "type": "gps",
      "timestamp": 2690.911586821079,
      "longitude": 17.975609
    },
    {
      "altitude": 153,
      "latitude": 50.689797,
      "type": "gps",
      "timestamp": 2695.89378464222,
      "longitude": 17.975773
    },
    {
      "altitude": 153,
      "latitude": 50.689767,
      "type": "gps",
      "timestamp": 2699.887531638145,
      "longitude": 17.975913
    },
    {
      "altitude": 153,
      "latitude": 50.689739,
      "type": "gps",
      "timestamp": 2703.882804870605,
      "longitude": 17.976052
    },
    {
      "altitude": 153,
      "latitude": 50.689704,
      "type": "gps",
      "timestamp": 2707.879243850708,
      "longitude": 17.976191
    },
    {
      "altitude": 153,
      "latitude": 50.689671,
      "type": "gps",
      "timestamp": 2711.881614387035,
      "longitude": 17.976325
    },
    {
      "altitude": 153,
      "latitude": 50.689635,
      "type": "gps",
      "timestamp": 2716.914191305637,
      "longitude": 17.976491
    },
    {
      "altitude": 153,
      "latitude": 50.6896,
      "type": "gps",
      "timestamp": 2721.907841980457,
      "longitude": 17.976653
    },
    {
      "altitude": 153,
      "latitude": 50.689569,
      "type": "gps",
      "timestamp": 2725.887449145317,
      "longitude": 17.97679
    },
    {
      "altitude": 153,
      "latitude": 50.689538,
      "type": "gps",
      "timestamp": 2730.893969416618,
      "longitude": 17.976952
    },
    {
      "altitude": 153,
      "latitude": 50.689504,
      "type": "gps",
      "timestamp": 2735.898156881332,
      "longitude": 17.977106
    },
    {
      "altitude": 153.0909090909091,
      "latitude": 50.689472,
      "type": "gps",
      "timestamp": 2740.919428229332,
      "longitude": 17.977261
    },
    {
      "altitude": 153.1818181818182,
      "latitude": 50.689438,
      "type": "gps",
      "timestamp": 2745.925935149193,
      "longitude": 17.977431
    },
    {
      "altitude": 153.27272727272728,
      "latitude": 50.68941,
      "type": "gps",
      "timestamp": 2750.922334432602,
      "longitude": 17.977601
    },
    {
      "altitude": 153.36363636363637,
      "latitude": 50.689379,
      "type": "gps",
      "timestamp": 2754.901355445385,
      "longitude": 17.977745
    },
    {
      "altitude": 153.45454545454547,
      "latitude": 50.689352,
      "type": "gps",
      "timestamp": 2758.917062342167,
      "longitude": 17.977895
    },
    {
      "altitude": 153.54545454545453,
      "latitude": 50.689319,
      "type": "gps",
      "timestamp": 2762.893361508846,
      "longitude": 17.978041
    },
    {
      "altitude": 153.8181818181818,
      "latitude": 50.689287,
      "type": "gps",
      "timestamp": 2766.907535493374,
      "longitude": 17.978196
    },
    {
      "altitude": 154.0909090909091,
      "latitude": 50.689258,
      "type": "gps",
      "timestamp": 2770.897301018238,
      "longitude": 17.978341
    },
    {
      "altitude": 154.36363636363637,
      "latitude": 50.689224,
      "type": "gps",
      "timestamp": 2774.89790892601,
      "longitude": 17.978483
    },
    {
      "altitude": 154.63636363636363,
      "latitude": 50.689193,
      "type": "gps",
      "timestamp": 2778.900330305099,
      "longitude": 17.978622
    },
    {
      "altitude": 154.9090909090909,
      "latitude": 50.689157,
      "type": "gps",
      "timestamp": 2783.882971227169,
      "longitude": 17.978788
    },
    {
      "altitude": 155.0909090909091,
      "latitude": 50.68913,
      "type": "gps",
      "timestamp": 2787.888532698154,
      "longitude": 17.978925
    },
    {
      "altitude": 155.54545454545453,
      "latitude": 50.689102,
      "type": "gps",
      "timestamp": 2791.891829431057,
      "longitude": 17.979064
    },
    {
      "altitude": 156,
      "latitude": 50.689067,
      "type": "gps",
      "timestamp": 2795.891894221306,
      "longitude": 17.979205
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.689035,
      "type": "gps",
      "timestamp": 2799.939642906189,
      "longitude": 17.979344
    },
    {
      "altitude": 156.54545454545453,
      "latitude": 50.688999,
      "type": "gps",
      "timestamp": 2803.943887352943,
      "longitude": 17.979487
    },
    {
      "altitude": 156.63636363636363,
      "latitude": 50.688963,
      "type": "gps",
      "timestamp": 2807.938473463058,
      "longitude": 17.979632
    },
    {
      "altitude": 156.54545454545453,
      "latitude": 50.688926,
      "type": "gps",
      "timestamp": 2811.907082974911,
      "longitude": 17.97978
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.688888,
      "type": "gps",
      "timestamp": 2815.922536671162,
      "longitude": 17.979924
    },
    {
      "altitude": 156.36363636363637,
      "latitude": 50.688851,
      "type": "gps",
      "timestamp": 2819.910807728767,
      "longitude": 17.980064
    },
    {
      "altitude": 156.27272727272728,
      "latitude": 50.688809,
      "type": "gps",
      "timestamp": 2823.92461258173,
      "longitude": 17.980209
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.688764,
      "type": "gps",
      "timestamp": 2827.919471859932,
      "longitude": 17.980347
    },
    {
      "altitude": 156.0909090909091,
      "latitude": 50.688726,
      "type": "gps",
      "timestamp": 2831.916964590549,
      "longitude": 17.980487
    },
    {
      "altitude": 155.8181818181818,
      "latitude": 50.688683,
      "type": "gps",
      "timestamp": 2835.91869789362,
      "longitude": 17.980621
    },
    {
      "altitude": 155.54545454545453,
      "latitude": 50.688644,
      "type": "gps",
      "timestamp": 2839.91676735878,
      "longitude": 17.980758
    },
    {
      "altitude": 155.27272727272728,
      "latitude": 50.688605,
      "type": "gps",
      "timestamp": 2843.895703971386,
      "longitude": 17.980891
    },
    {
      "altitude": 155.36363636363637,
      "latitude": 50.688566,
      "type": "gps",
      "timestamp": 2847.917173504829,
      "longitude": 17.981029
    },
    {
      "altitude": 155.45454545454547,
      "latitude": 50.688526,
      "type": "gps",
      "timestamp": 2851.905690073967,
      "longitude": 17.981165
    },
    {
      "altitude": 155.54545454545453,
      "latitude": 50.688484,
      "type": "gps",
      "timestamp": 2855.925684154034,
      "longitude": 17.981299
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.688439,
      "type": "gps",
      "timestamp": 2859.92223751545,
      "longitude": 17.981433
    },
    {
      "altitude": 155.9090909090909,
      "latitude": 50.688394,
      "type": "gps",
      "timestamp": 2863.922747373581,
      "longitude": 17.981568
    },
    {
      "altitude": 156.0909090909091,
      "latitude": 50.688348,
      "type": "gps",
      "timestamp": 2867.9284106493,
      "longitude": 17.981702
    },
    {
      "altitude": 156.27272727272728,
      "latitude": 50.688303,
      "type": "gps",
      "timestamp": 2871.922420322895,
      "longitude": 17.981845
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.688263,
      "type": "gps",
      "timestamp": 2875.912017822266,
      "longitude": 17.98198
    },
    {
      "altitude": 156.54545454545453,
      "latitude": 50.688222,
      "type": "gps",
      "timestamp": 2879.913192093372,
      "longitude": 17.982111
    },
    {
      "altitude": 156.54545454545453,
      "latitude": 50.688172,
      "type": "gps",
      "timestamp": 2884.906753778458,
      "longitude": 17.982259
    },
    {
      "altitude": 156.54545454545453,
      "latitude": 50.688129,
      "type": "gps",
      "timestamp": 2889.90290594101,
      "longitude": 17.982411
    },
    {
      "altitude": 156.54545454545453,
      "latitude": 50.688065,
      "type": "gps",
      "timestamp": 2894.909590065479,
      "longitude": 17.982556
    },
    {
      "altitude": 156.54545454545453,
      "latitude": 50.688015,
      "type": "gps",
      "timestamp": 2898.907609820366,
      "longitude": 17.982675
    },
    {
      "altitude": 156.54545454545453,
      "latitude": 50.687962,
      "type": "gps",
      "timestamp": 2903.924735307693,
      "longitude": 17.982817
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.687908,
      "type": "gps",
      "timestamp": 2907.935556471348,
      "longitude": 17.982944
    },
    {
      "altitude": 156.36363636363637,
      "latitude": 50.687857,
      "type": "gps",
      "timestamp": 2911.923591434956,
      "longitude": 17.983076
    },
    {
      "altitude": 156.27272727272728,
      "latitude": 50.68781,
      "type": "gps",
      "timestamp": 2915.912700235844,
      "longitude": 17.983202
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.68776,
      "type": "gps",
      "timestamp": 2919.899380922318,
      "longitude": 17.983326
    },
    {
      "altitude": 156.0909090909091,
      "latitude": 50.68771,
      "type": "gps",
      "timestamp": 2923.904239594936,
      "longitude": 17.983455
    },
    {
      "altitude": 156,
      "latitude": 50.687662,
      "type": "gps",
      "timestamp": 2927.9043161273,
      "longitude": 17.983589
    },
    {
      "altitude": 156,
      "latitude": 50.687614,
      "type": "gps",
      "timestamp": 2931.910034358501,
      "longitude": 17.983723
    },
    {
      "altitude": 156,
      "latitude": 50.687558,
      "type": "gps",
      "timestamp": 2935.901742875576,
      "longitude": 17.98385
    },
    {
      "altitude": 156,
      "latitude": 50.687503,
      "type": "gps",
      "timestamp": 2939.908510148525,
      "longitude": 17.983974
    },
    {
      "altitude": 156.0909090909091,
      "latitude": 50.687445,
      "type": "gps",
      "timestamp": 2943.903428435326,
      "longitude": 17.984097
    },
    {
      "altitude": 156,
      "latitude": 50.687389,
      "type": "gps",
      "timestamp": 2947.940514087677,
      "longitude": 17.984224
    },
    {
      "altitude": 155.9090909090909,
      "latitude": 50.687328,
      "type": "gps",
      "timestamp": 2952.918980360031,
      "longitude": 17.984375
    },
    {
      "altitude": 155.8181818181818,
      "latitude": 50.687278,
      "type": "gps",
      "timestamp": 2956.923759281635,
      "longitude": 17.984501
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.687224,
      "type": "gps",
      "timestamp": 2960.915481984615,
      "longitude": 17.984622
    },
    {
      "altitude": 155.63636363636363,
      "latitude": 50.687155,
      "type": "gps",
      "timestamp": 2965.914252579212,
      "longitude": 17.984762
    },
    {
      "altitude": 155.54545454545453,
      "latitude": 50.687101,
      "type": "gps",
      "timestamp": 2969.909495353699,
      "longitude": 17.984886
    },
    {
      "altitude": 155.45454545454547,
      "latitude": 50.687042,
      "type": "gps",
      "timestamp": 2973.916955649853,
      "longitude": 17.985007
    },
    {
      "altitude": 155.36363636363637,
      "latitude": 50.68699,
      "type": "gps",
      "timestamp": 2977.916773319244,
      "longitude": 17.985134
    },
    {
      "altitude": 155.27272727272728,
      "latitude": 50.686927,
      "type": "gps",
      "timestamp": 2981.921948611736,
      "longitude": 17.985253
    },
    {
      "altitude": 155.1818181818182,
      "latitude": 50.686877,
      "type": "gps",
      "timestamp": 2985.921743750572,
      "longitude": 17.985385
    },
    {
      "altitude": 155,
      "latitude": 50.686818,
      "type": "gps",
      "timestamp": 2990.92392116785,
      "longitude": 17.985532
    },
    {
      "altitude": 155,
      "latitude": 50.686766,
      "type": "gps",
      "timestamp": 2994.921151161194,
      "longitude": 17.985652
    },
    {
      "altitude": 155,
      "latitude": 50.686698,
      "type": "gps",
      "timestamp": 2999.923826217651,
      "longitude": 17.985789
    },
    {
      "altitude": 155,
      "latitude": 50.686642,
      "type": "gps",
      "timestamp": 3003.909776628017,
      "longitude": 17.985906
    },
    {
      "altitude": 154.8181818181818,
      "latitude": 50.686584,
      "type": "gps",
      "timestamp": 3007.930160522461,
      "longitude": 17.986028
    },
    {
      "altitude": 154.63636363636363,
      "latitude": 50.686527,
      "type": "gps",
      "timestamp": 3011.915632307529,
      "longitude": 17.986138
    },
    {
      "altitude": 154.45454545454547,
      "latitude": 50.686463,
      "type": "gps",
      "timestamp": 3015.9098508358,
      "longitude": 17.986246
    },
    {
      "altitude": 154.27272727272728,
      "latitude": 50.686405,
      "type": "gps",
      "timestamp": 3019.89964222908,
      "longitude": 17.98636
    },
    {
      "altitude": 154.0909090909091,
      "latitude": 50.686343,
      "type": "gps",
      "timestamp": 3023.896739244461,
      "longitude": 17.98647
    },
    {
      "altitude": 153.9090909090909,
      "latitude": 50.686282,
      "type": "gps",
      "timestamp": 3027.910896420479,
      "longitude": 17.986584
    },
    {
      "altitude": 153.72727272727272,
      "latitude": 50.686222,
      "type": "gps",
      "timestamp": 3031.90095603466,
      "longitude": 17.9867
    },
    {
      "altitude": 153.54545454545453,
      "latitude": 50.686161,
      "type": "gps",
      "timestamp": 3035.898154437542,
      "longitude": 17.986807
    },
    {
      "altitude": 153.36363636363637,
      "latitude": 50.686097,
      "type": "gps",
      "timestamp": 3039.904647171497,
      "longitude": 17.986923
    },
    {
      "altitude": 153.1818181818182,
      "latitude": 50.686043,
      "type": "gps",
      "timestamp": 3043.881591200829,
      "longitude": 17.987046
    },
    {
      "altitude": 153,
      "latitude": 50.685968,
      "type": "gps",
      "timestamp": 3048.918951153755,
      "longitude": 17.987175
    },
    {
      "altitude": 153,
      "latitude": 50.685896,
      "type": "gps",
      "timestamp": 3052.923996210098,
      "longitude": 17.987262
    },
    {
      "altitude": 153,
      "latitude": 50.685822,
      "type": "gps",
      "timestamp": 3057.915348112583,
      "longitude": 17.987391
    },
    {
      "altitude": 153.0909090909091,
      "latitude": 50.685762,
      "type": "gps",
      "timestamp": 3061.929452359676,
      "longitude": 17.987498
    },
    {
      "altitude": 153.1818181818182,
      "latitude": 50.685694,
      "type": "gps",
      "timestamp": 3067.897019684315,
      "longitude": 17.987616
    },
    {
      "altitude": 153.27272727272728,
      "latitude": 50.685624,
      "type": "gps",
      "timestamp": 3072.928241372108,
      "longitude": 17.987723
    },
    {
      "altitude": 153.36363636363637,
      "latitude": 50.685557,
      "type": "gps",
      "timestamp": 3076.922519505024,
      "longitude": 17.987826
    },
    {
      "altitude": 153.45454545454547,
      "latitude": 50.685488,
      "type": "gps",
      "timestamp": 3080.916445374489,
      "longitude": 17.987937
    },
    {
      "altitude": 153.54545454545453,
      "latitude": 50.68542,
      "type": "gps",
      "timestamp": 3084.902734220028,
      "longitude": 17.988047
    },
    {
      "altitude": 153.63636363636363,
      "latitude": 50.685348,
      "type": "gps",
      "timestamp": 3088.904104948044,
      "longitude": 17.988159
    },
    {
      "altitude": 153.72727272727272,
      "latitude": 50.685278,
      "type": "gps",
      "timestamp": 3092.878501594067,
      "longitude": 17.98827
    },
    {
      "altitude": 153.8181818181818,
      "latitude": 50.685211,
      "type": "gps",
      "timestamp": 3096.914912223816,
      "longitude": 17.988373
    },
    {
      "altitude": 153.9090909090909,
      "latitude": 50.685144,
      "type": "gps",
      "timestamp": 3100.920389711857,
      "longitude": 17.988479
    },
    {
      "altitude": 154,
      "latitude": 50.685075,
      "type": "gps",
      "timestamp": 3104.923246502876,
      "longitude": 17.988587
    },
    {
      "altitude": 154,
      "latitude": 50.685002,
      "type": "gps",
      "timestamp": 3108.928793132305,
      "longitude": 17.988695
    },
    {
      "altitude": 154.0909090909091,
      "latitude": 50.684931,
      "type": "gps",
      "timestamp": 3112.893858909607,
      "longitude": 17.988807
    },
    {
      "altitude": 154.1818181818182,
      "latitude": 50.684859,
      "type": "gps",
      "timestamp": 3116.9013333320618,
      "longitude": 17.988913
    },
    {
      "altitude": 154.27272727272728,
      "latitude": 50.684784,
      "type": "gps",
      "timestamp": 3120.921374678612,
      "longitude": 17.989016
    },
    {
      "altitude": 154.36363636363637,
      "latitude": 50.684708,
      "type": "gps",
      "timestamp": 3124.885481178761,
      "longitude": 17.989119
    },
    {
      "altitude": 154.54545454545453,
      "latitude": 50.68464,
      "type": "gps",
      "timestamp": 3128.895228505135,
      "longitude": 17.98923
    },
    {
      "altitude": 154.72727272727272,
      "latitude": 50.684573,
      "type": "gps",
      "timestamp": 3132.896887660027,
      "longitude": 17.989327
    },
    {
      "altitude": 154.9090909090909,
      "latitude": 50.684512,
      "type": "gps",
      "timestamp": 3136.895978212357,
      "longitude": 17.989433
    },
    {
      "altitude": 155.0909090909091,
      "latitude": 50.68444,
      "type": "gps",
      "timestamp": 3140.885776817799,
      "longitude": 17.989534
    },
    {
      "altitude": 155.27272727272728,
      "latitude": 50.684364,
      "type": "gps",
      "timestamp": 3144.89742732048,
      "longitude": 17.989632
    },
    {
      "altitude": 155.45454545454547,
      "latitude": 50.684301,
      "type": "gps",
      "timestamp": 3148.889504373074,
      "longitude": 17.989749
    },
    {
      "altitude": 155.63636363636363,
      "latitude": 50.68426,
      "type": "gps",
      "timestamp": 3152.922763824463,
      "longitude": 17.989882
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.684266,
      "type": "gps",
      "timestamp": 3156.895421922207,
      "longitude": 17.990032
    },
    {
      "altitude": 155.63636363636363,
      "latitude": 50.68424,
      "type": "gps",
      "timestamp": 3160.8924232125282,
      "longitude": 17.990186
    },
    {
      "altitude": 155.54545454545453,
      "latitude": 50.684133,
      "type": "gps",
      "timestamp": 3164.900795102119,
      "longitude": 17.990197
    },
    {
      "altitude": 155.45454545454547,
      "latitude": 50.68403,
      "type": "gps",
      "timestamp": 3168.929575264454,
      "longitude": 17.990193
    },
    {
      "altitude": 155.27272727272728,
      "latitude": 50.683925,
      "type": "gps",
      "timestamp": 3172.924442410469,
      "longitude": 17.990198
    },
    {
      "altitude": 155.0909090909091,
      "latitude": 50.683834,
      "type": "gps",
      "timestamp": 3176.907479524612,
      "longitude": 17.990256
    },
    {
      "altitude": 154.9090909090909,
      "latitude": 50.683755,
      "type": "gps",
      "timestamp": 3180.909806549549,
      "longitude": 17.990344
    },
    {
      "altitude": 154.72727272727272,
      "latitude": 50.683677,
      "type": "gps",
      "timestamp": 3184.913917601109,
      "longitude": 17.990434
    },
    {
      "altitude": 154.54545454545453,
      "latitude": 50.683597,
      "type": "gps",
      "timestamp": 3188.886023104191,
      "longitude": 17.990528
    },
    {
      "altitude": 154.36363636363637,
      "latitude": 50.683525,
      "type": "gps",
      "timestamp": 3192.893143594265,
      "longitude": 17.99062
    },
    {
      "altitude": 154.1818181818182,
      "latitude": 50.683449,
      "type": "gps",
      "timestamp": 3196.889365911484,
      "longitude": 17.990709
    },
    {
      "altitude": 154,
      "latitude": 50.683369,
      "type": "gps",
      "timestamp": 3200.685401201248,
      "longitude": 17.990802
    },
    {
      "altitude": 154,
      "latitude": 50.683288,
      "type": "gps",
      "timestamp": 3204.895755708218,
      "longitude": 17.990892
    },
    {
      "altitude": 154,
      "latitude": 50.683206,
      "type": "gps",
      "timestamp": 3208.910800039768,
      "longitude": 17.990983
    },
    {
      "altitude": 154,
      "latitude": 50.683116,
      "type": "gps",
      "timestamp": 3212.915864050388,
      "longitude": 17.99108
    },
    {
      "altitude": 154,
      "latitude": 50.683027,
      "type": "gps",
      "timestamp": 3216.932485222816,
      "longitude": 17.991171
    },
    {
      "altitude": 154,
      "latitude": 50.682941,
      "type": "gps",
      "timestamp": 3220.914798080921,
      "longitude": 17.99127
    },
    {
      "altitude": 154,
      "latitude": 50.682856,
      "type": "gps",
      "timestamp": 3224.915277659893,
      "longitude": 17.991359
    },
    {
      "altitude": 154,
      "latitude": 50.682767,
      "type": "gps",
      "timestamp": 3228.916244328022,
      "longitude": 17.991454
    },
    {
      "altitude": 154,
      "latitude": 50.682676,
      "type": "gps",
      "timestamp": 3232.905561208725,
      "longitude": 17.991553
    },
    {
      "altitude": 154,
      "latitude": 50.682585,
      "type": "gps",
      "timestamp": 3236.885067939758,
      "longitude": 17.991648
    },
    {
      "altitude": 154.1818181818182,
      "latitude": 50.682498,
      "type": "gps",
      "timestamp": 3240.905414760113,
      "longitude": 17.991736
    },
    {
      "altitude": 154.36363636363637,
      "latitude": 50.682409,
      "type": "gps",
      "timestamp": 3244.92727035284,
      "longitude": 17.991817
    },
    {
      "altitude": 154.54545454545453,
      "latitude": 50.68232,
      "type": "gps",
      "timestamp": 3248.905010402203,
      "longitude": 17.991898
    },
    {
      "altitude": 154.72727272727272,
      "latitude": 50.682234,
      "type": "gps",
      "timestamp": 3252.893506348133,
      "longitude": 17.99198
    },
    {
      "altitude": 154.9090909090909,
      "latitude": 50.682149,
      "type": "gps",
      "timestamp": 3256.895872354507,
      "longitude": 17.992061
    },
    {
      "altitude": 155.0909090909091,
      "latitude": 50.682066,
      "type": "gps",
      "timestamp": 3260.925081551075,
      "longitude": 17.992149
    },
    {
      "altitude": 155.27272727272728,
      "latitude": 50.681983,
      "type": "gps",
      "timestamp": 3264.893037796021,
      "longitude": 17.992231
    },
    {
      "altitude": 155.45454545454547,
      "latitude": 50.681885,
      "type": "gps",
      "timestamp": 3268.919891357422,
      "longitude": 17.992319
    },
    {
      "altitude": 155.63636363636363,
      "latitude": 50.681805,
      "type": "gps",
      "timestamp": 3271.9194641709328,
      "longitude": 17.992386
    },
    {
      "altitude": 155.8181818181818,
      "latitude": 50.681714,
      "type": "gps",
      "timestamp": 3275.917770326138,
      "longitude": 17.992462
    },
    {
      "altitude": 156,
      "latitude": 50.681625,
      "type": "gps",
      "timestamp": 3279.922444045544,
      "longitude": 17.992539
    },
    {
      "altitude": 156,
      "latitude": 50.681529,
      "type": "gps",
      "timestamp": 3283.927238881588,
      "longitude": 17.992616
    },
    {
      "altitude": 156,
      "latitude": 50.681434,
      "type": "gps",
      "timestamp": 3287.88397115469,
      "longitude": 17.992691
    },
    {
      "altitude": 156,
      "latitude": 50.681338,
      "type": "gps",
      "timestamp": 3291.892125248909,
      "longitude": 17.992764
    },
    {
      "altitude": 156,
      "latitude": 50.681247,
      "type": "gps",
      "timestamp": 3295.878521621227,
      "longitude": 17.992839
    },
    {
      "altitude": 156,
      "latitude": 50.681148,
      "type": "gps",
      "timestamp": 3299.897356569767,
      "longitude": 17.992913
    },
    {
      "altitude": 156,
      "latitude": 50.681053,
      "type": "gps",
      "timestamp": 3303.9024913311,
      "longitude": 17.992983
    },
    {
      "altitude": 156,
      "latitude": 50.680963,
      "type": "gps",
      "timestamp": 3307.919719219208,
      "longitude": 17.993047
    },
    {
      "altitude": 156,
      "latitude": 50.680869,
      "type": "gps",
      "timestamp": 3311.91778755188,
      "longitude": 17.993118
    },
    {
      "altitude": 156,
      "latitude": 50.680774,
      "type": "gps",
      "timestamp": 3315.915286719799,
      "longitude": 17.9932
    },
    {
      "altitude": 156,
      "latitude": 50.680685,
      "type": "gps",
      "timestamp": 3319.920228481293,
      "longitude": 17.993273
    },
    {
      "altitude": 156,
      "latitude": 50.680597,
      "type": "gps",
      "timestamp": 3323.921663105488,
      "longitude": 17.993345
    },
    {
      "altitude": 156,
      "latitude": 50.680504,
      "type": "gps",
      "timestamp": 3327.911707103252,
      "longitude": 17.993362
    },
    {
      "altitude": 156,
      "latitude": 50.680413,
      "type": "gps",
      "timestamp": 3331.921565830708,
      "longitude": 17.993272
    },
    {
      "altitude": 156,
      "latitude": 50.680326,
      "type": "gps",
      "timestamp": 3335.892907738686,
      "longitude": 17.993183
    },
    {
      "altitude": 156,
      "latitude": 50.680234,
      "type": "gps",
      "timestamp": 3339.921022295952,
      "longitude": 17.993146
    },
    {
      "altitude": 156,
      "latitude": 50.680157,
      "type": "gps",
      "timestamp": 3343.918939769268,
      "longitude": 17.993228
    },
    {
      "altitude": 156,
      "latitude": 50.680102,
      "type": "gps",
      "timestamp": 3348.920140624046,
      "longitude": 17.993366
    },
    {
      "altitude": 156,
      "latitude": 50.680065,
      "type": "gps",
      "timestamp": 3352.929910063744,
      "longitude": 17.993497
    },
    {
      "altitude": 156.0909090909091,
      "latitude": 50.680026,
      "type": "gps",
      "timestamp": 3356.914716482162,
      "longitude": 17.993628
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.679937,
      "type": "gps",
      "timestamp": 3361.907722771168,
      "longitude": 17.993728
    },
    {
      "altitude": 156.27272727272728,
      "latitude": 50.679855,
      "type": "gps",
      "timestamp": 3365.888850092888,
      "longitude": 17.99379
    },
    {
      "altitude": 156.36363636363637,
      "latitude": 50.679768,
      "type": "gps",
      "timestamp": 3369.912181258202,
      "longitude": 17.993835
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.679662,
      "type": "gps",
      "timestamp": 3374.921547889709,
      "longitude": 17.993887
    },
    {
      "altitude": 156.54545454545453,
      "latitude": 50.679568,
      "type": "gps",
      "timestamp": 3378.920776963234,
      "longitude": 17.993937
    },
    {
      "altitude": 156.63636363636363,
      "latitude": 50.679478,
      "type": "gps",
      "timestamp": 3382.902779579163,
      "longitude": 17.993979
    },
    {
      "altitude": 156.72727272727272,
      "latitude": 50.679391,
      "type": "gps",
      "timestamp": 3386.901402175426,
      "longitude": 17.994021
    },
    {
      "altitude": 156.8181818181818,
      "latitude": 50.679302,
      "type": "gps",
      "timestamp": 3390.910628855228,
      "longitude": 17.994069
    },
    {
      "altitude": 156.8181818181818,
      "latitude": 50.679209,
      "type": "gps",
      "timestamp": 3394.915556490421,
      "longitude": 17.994108
    },
    {
      "altitude": 156.8181818181818,
      "latitude": 50.679108,
      "type": "gps",
      "timestamp": 3398.922322869301,
      "longitude": 17.994143
    },
    {
      "altitude": 156.72727272727272,
      "latitude": 50.679013,
      "type": "gps",
      "timestamp": 3402.905034959316,
      "longitude": 17.994176
    },
    {
      "altitude": 156.63636363636363,
      "latitude": 50.67892,
      "type": "gps",
      "timestamp": 3406.91962492466,
      "longitude": 17.994217
    },
    {
      "altitude": 156.54545454545453,
      "latitude": 50.678826,
      "type": "gps",
      "timestamp": 3410.908783495426,
      "longitude": 17.994259
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.678731,
      "type": "gps",
      "timestamp": 3414.91623032093,
      "longitude": 17.994299
    },
    {
      "altitude": 156.36363636363637,
      "latitude": 50.678634,
      "type": "gps",
      "timestamp": 3418.92792993784,
      "longitude": 17.994338
    },
    {
      "altitude": 156.27272727272728,
      "latitude": 50.678539,
      "type": "gps",
      "timestamp": 3422.894236862659,
      "longitude": 17.994376
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.678441,
      "type": "gps",
      "timestamp": 3426.884502530098,
      "longitude": 17.994413
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.678343,
      "type": "gps",
      "timestamp": 3430.884154498577,
      "longitude": 17.99445
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.678249,
      "type": "gps",
      "timestamp": 3434.90883231163,
      "longitude": 17.994483
    },
    {
      "altitude": 156.27272727272728,
      "latitude": 50.678138,
      "type": "gps",
      "timestamp": 3439.922169387341,
      "longitude": 17.994517
    },
    {
      "altitude": 156.36363636363637,
      "latitude": 50.678043,
      "type": "gps",
      "timestamp": 3443.908794760704,
      "longitude": 17.994554
    },
    {
      "altitude": 156.36363636363637,
      "latitude": 50.677949,
      "type": "gps",
      "timestamp": 3447.885854184628,
      "longitude": 17.994587
    },
    {
      "altitude": 156.36363636363637,
      "latitude": 50.677858,
      "type": "gps",
      "timestamp": 3451.929418623447,
      "longitude": 17.994613
    },
    {
      "altitude": 156.36363636363637,
      "latitude": 50.67776,
      "type": "gps",
      "timestamp": 3455.924585103989,
      "longitude": 17.994652
    },
    {
      "altitude": 156.36363636363637,
      "latitude": 50.677655,
      "type": "gps",
      "timestamp": 3459.915851831436,
      "longitude": 17.994686
    },
    {
      "altitude": 156.27272727272728,
      "latitude": 50.677552,
      "type": "gps",
      "timestamp": 3463.910014212132,
      "longitude": 17.994701
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.677443,
      "type": "gps",
      "timestamp": 3467.907296955585,
      "longitude": 17.994725
    },
    {
      "altitude": 156.0909090909091,
      "latitude": 50.677341,
      "type": "gps",
      "timestamp": 3471.916707217693,
      "longitude": 17.994755
    },
    {
      "altitude": 155.9090909090909,
      "latitude": 50.677248,
      "type": "gps",
      "timestamp": 3475.906365990639,
      "longitude": 17.994785
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.677149,
      "type": "gps",
      "timestamp": 3479.896810948849,
      "longitude": 17.994809
    },
    {
      "altitude": 155.54545454545453,
      "latitude": 50.677054,
      "type": "gps",
      "timestamp": 3483.893110692501,
      "longitude": 17.994837
    },
    {
      "altitude": 155.36363636363637,
      "latitude": 50.676956,
      "type": "gps",
      "timestamp": 3487.887936234474,
      "longitude": 17.994855
    },
    {
      "altitude": 155.27272727272728,
      "latitude": 50.676861,
      "type": "gps",
      "timestamp": 3491.899632692337,
      "longitude": 17.994883
    },
    {
      "altitude": 155.1818181818182,
      "latitude": 50.676764,
      "type": "gps",
      "timestamp": 3495.901007592678,
      "longitude": 17.994919
    },
    {
      "altitude": 155.0909090909091,
      "latitude": 50.676675,
      "type": "gps",
      "timestamp": 3499.901570558548,
      "longitude": 17.994976
    },
    {
      "altitude": 155,
      "latitude": 50.676648,
      "type": "gps",
      "timestamp": 3503.902984440327,
      "longitude": 17.995124
    },
    {
      "altitude": 155,
      "latitude": 50.676689,
      "type": "gps",
      "timestamp": 3507.948273956776,
      "longitude": 17.99528
    },
    {
      "altitude": 155,
      "latitude": 50.676747,
      "type": "gps",
      "timestamp": 3511.923899292946,
      "longitude": 17.995425
    },
    {
      "altitude": 155,
      "latitude": 50.676801,
      "type": "gps",
      "timestamp": 3515.910066485405,
      "longitude": 17.995565
    },
    {
      "altitude": 155.0909090909091,
      "latitude": 50.676844,
      "type": "gps",
      "timestamp": 3519.929517328739,
      "longitude": 17.995709
    },
    {
      "altitude": 155.1818181818182,
      "latitude": 50.676886,
      "type": "gps",
      "timestamp": 3523.89245814085,
      "longitude": 17.99585
    },
    {
      "altitude": 155.1818181818182,
      "latitude": 50.676935,
      "type": "gps",
      "timestamp": 3527.891762256622,
      "longitude": 17.995989
    },
    {
      "altitude": 155.1818181818182,
      "latitude": 50.676985,
      "type": "gps",
      "timestamp": 3531.893781125546,
      "longitude": 17.996131
    },
    {
      "altitude": 155.1818181818182,
      "latitude": 50.67702,
      "type": "gps",
      "timestamp": 3535.898387372494,
      "longitude": 17.99627
    },
    {
      "altitude": 155.1818181818182,
      "latitude": 50.677063,
      "type": "gps",
      "timestamp": 3539.894744515419,
      "longitude": 17.996408
    },
    {
      "altitude": 155.1818181818182,
      "latitude": 50.677104,
      "type": "gps",
      "timestamp": 3543.899399638176,
      "longitude": 17.996555
    },
    {
      "altitude": 155.1818181818182,
      "latitude": 50.677147,
      "type": "gps",
      "timestamp": 3547.89266461134,
      "longitude": 17.996701
    },
    {
      "altitude": 155.1818181818182,
      "latitude": 50.677193,
      "type": "gps",
      "timestamp": 3551.900651752949,
      "longitude": 17.996843
    },
    {
      "altitude": 155.1818181818182,
      "latitude": 50.67724,
      "type": "gps",
      "timestamp": 3555.890377819538,
      "longitude": 17.996978
    },
    {
      "altitude": 155.1818181818182,
      "latitude": 50.677284,
      "type": "gps",
      "timestamp": 3559.891832113266,
      "longitude": 17.997114
    },
    {
      "altitude": 155.0909090909091,
      "latitude": 50.677331,
      "type": "gps",
      "timestamp": 3563.911036133766,
      "longitude": 17.997251
    },
    {
      "altitude": 155.0909090909091,
      "latitude": 50.677376,
      "type": "gps",
      "timestamp": 3567.931299328804,
      "longitude": 17.997394
    },
    {
      "altitude": 155.1818181818182,
      "latitude": 50.677425,
      "type": "gps",
      "timestamp": 3571.915322244167,
      "longitude": 17.997531
    },
    {
      "altitude": 155.27272727272728,
      "latitude": 50.677473,
      "type": "gps",
      "timestamp": 3575.913768470287,
      "longitude": 17.997682
    },
    {
      "altitude": 155.36363636363637,
      "latitude": 50.677514,
      "type": "gps",
      "timestamp": 3579.928138434887,
      "longitude": 17.997828
    },
    {
      "altitude": 155.45454545454547,
      "latitude": 50.677556,
      "type": "gps",
      "timestamp": 3583.928177952766,
      "longitude": 17.997975
    },
    {
      "altitude": 155.54545454545453,
      "latitude": 50.677606,
      "type": "gps",
      "timestamp": 3587.936124622822,
      "longitude": 17.998119
    },
    {
      "altitude": 155.63636363636363,
      "latitude": 50.677655,
      "type": "gps",
      "timestamp": 3591.870410978794,
      "longitude": 17.998257
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.677699,
      "type": "gps",
      "timestamp": 3595.898748874664,
      "longitude": 17.998393
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.677737,
      "type": "gps",
      "timestamp": 3599.921793043613,
      "longitude": 17.99853
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.677777,
      "type": "gps",
      "timestamp": 3603.901871442795,
      "longitude": 17.998671
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.677821,
      "type": "gps",
      "timestamp": 3607.907918930054,
      "longitude": 17.998812
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.677868,
      "type": "gps",
      "timestamp": 3611.884065568447,
      "longitude": 17.99896
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.677912,
      "type": "gps",
      "timestamp": 3615.90823829174,
      "longitude": 17.999097
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.67796,
      "type": "gps",
      "timestamp": 3619.883567929268,
      "longitude": 17.999232
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.678004,
      "type": "gps",
      "timestamp": 3623.887233912945,
      "longitude": 17.999372
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.678044,
      "type": "gps",
      "timestamp": 3627.899090051651,
      "longitude": 17.999506
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.678093,
      "type": "gps",
      "timestamp": 3631.885082125664,
      "longitude": 17.999646
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.678135,
      "type": "gps",
      "timestamp": 3635.88714581728,
      "longitude": 17.999785
    },
    {
      "altitude": 155.72727272727272,
      "latitude": 50.678164,
      "type": "gps",
      "timestamp": 3639.923024296761,
      "longitude": 17.999925
    },
    {
      "altitude": 155.8181818181818,
      "latitude": 50.678205,
      "type": "gps",
      "timestamp": 3643.915675640106,
      "longitude": 18.000061
    },
    {
      "altitude": 155.9090909090909,
      "latitude": 50.678251,
      "type": "gps",
      "timestamp": 3647.917856931686,
      "longitude": 18.000197
    },
    {
      "altitude": 156,
      "latitude": 50.678305,
      "type": "gps",
      "timestamp": 3651.928237557411,
      "longitude": 18.000337
    },
    {
      "altitude": 156,
      "latitude": 50.67835,
      "type": "gps",
      "timestamp": 3655.891201794147,
      "longitude": 18.000476
    },
    {
      "altitude": 156.0909090909091,
      "latitude": 50.678391,
      "type": "gps",
      "timestamp": 3659.90183442831,
      "longitude": 18.000615
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.678431,
      "type": "gps",
      "timestamp": 3663.873132944107,
      "longitude": 18.000753
    },
    {
      "altitude": 156.27272727272728,
      "latitude": 50.678477,
      "type": "gps",
      "timestamp": 3667.887815952301,
      "longitude": 18.000897
    },
    {
      "altitude": 156.36363636363637,
      "latitude": 50.678521,
      "type": "gps",
      "timestamp": 3671.895941436291,
      "longitude": 18.001039
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.678571,
      "type": "gps",
      "timestamp": 3675.926113665104,
      "longitude": 18.00118
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.678619,
      "type": "gps",
      "timestamp": 3679.94129472971,
      "longitude": 18.001312
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.678661,
      "type": "gps",
      "timestamp": 3683.874075889587,
      "longitude": 18.001453
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.678702,
      "type": "gps",
      "timestamp": 3687.886391878128,
      "longitude": 18.001583
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.678743,
      "type": "gps",
      "timestamp": 3691.907626509666,
      "longitude": 18.001714
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.678791,
      "type": "gps",
      "timestamp": 3696.9045804739,
      "longitude": 18.001875
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.678827,
      "type": "gps",
      "timestamp": 3700.924566507339,
      "longitude": 18.002006
    },
    {
      "altitude": 156.36363636363637,
      "latitude": 50.678872,
      "type": "gps",
      "timestamp": 3704.923183679581,
      "longitude": 18.002143
    },
    {
      "altitude": 156.27272727272728,
      "latitude": 50.678918,
      "type": "gps",
      "timestamp": 3708.928994357586,
      "longitude": 18.002269
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.678962,
      "type": "gps",
      "timestamp": 3712.897530734539,
      "longitude": 18.002399
    },
    {
      "altitude": 156.0909090909091,
      "latitude": 50.679015,
      "type": "gps",
      "timestamp": 3717.891240358353,
      "longitude": 18.002551
    },
    {
      "altitude": 156,
      "latitude": 50.679055,
      "type": "gps",
      "timestamp": 3721.889930844307,
      "longitude": 18.002679
    },
    {
      "altitude": 156,
      "latitude": 50.679095,
      "type": "gps",
      "timestamp": 3725.888534128666,
      "longitude": 18.002815
    },
    {
      "altitude": 156,
      "latitude": 50.679146,
      "type": "gps",
      "timestamp": 3729.922832846642,
      "longitude": 18.002942
    },
    {
      "altitude": 156,
      "latitude": 50.679187,
      "type": "gps",
      "timestamp": 3733.91327470541,
      "longitude": 18.003076
    },
    {
      "altitude": 156,
      "latitude": 50.679232,
      "type": "gps",
      "timestamp": 3737.905190169811,
      "longitude": 18.003207
    },
    {
      "altitude": 156,
      "latitude": 50.67928,
      "type": "gps",
      "timestamp": 3741.898911058903,
      "longitude": 18.003338
    },
    {
      "altitude": 156,
      "latitude": 50.679316,
      "type": "gps",
      "timestamp": 3745.889621198177,
      "longitude": 18.003469
    },
    {
      "altitude": 156,
      "latitude": 50.679365,
      "type": "gps",
      "timestamp": 3749.900165975094,
      "longitude": 18.003605
    },
    {
      "altitude": 156,
      "latitude": 50.679416,
      "type": "gps",
      "timestamp": 3753.8884293437,
      "longitude": 18.003734
    },
    {
      "altitude": 156,
      "latitude": 50.679463,
      "type": "gps",
      "timestamp": 3757.919684171677,
      "longitude": 18.003872
    },
    {
      "altitude": 156,
      "latitude": 50.679488,
      "type": "gps",
      "timestamp": 3761.923373520374,
      "longitude": 18.004009
    },
    {
      "altitude": 156.0909090909091,
      "latitude": 50.679535,
      "type": "gps",
      "timestamp": 3765.919051527977,
      "longitude": 18.004146
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.679582,
      "type": "gps",
      "timestamp": 3770.924046218395,
      "longitude": 18.004312
    },
    {
      "altitude": 156.27272727272728,
      "latitude": 50.679625,
      "type": "gps",
      "timestamp": 3774.915111839771,
      "longitude": 18.004453
    },
    {
      "altitude": 156.36363636363637,
      "latitude": 50.679678,
      "type": "gps",
      "timestamp": 3778.880281925201,
      "longitude": 18.004587
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.679682,
      "type": "gps",
      "timestamp": 3782.895601511002,
      "longitude": 18.004736
    },
    {
      "altitude": 156.54545454545453,
      "latitude": 50.679631,
      "type": "gps",
      "timestamp": 3786.907674193382,
      "longitude": 18.004889
    },
    {
      "altitude": 156.63636363636363,
      "latitude": 50.679589,
      "type": "gps",
      "timestamp": 3790.88064789772,
      "longitude": 18.005038
    },
    {
      "altitude": 156.72727272727272,
      "latitude": 50.679547,
      "type": "gps",
      "timestamp": 3794.8880828619,
      "longitude": 18.005186
    },
    {
      "altitude": 156.8181818181818,
      "latitude": 50.679499,
      "type": "gps",
      "timestamp": 3798.90886515379,
      "longitude": 18.005318
    },
    {
      "altitude": 156.9090909090909,
      "latitude": 50.679461,
      "type": "gps",
      "timestamp": 3802.909419834614,
      "longitude": 18.00546
    },
    {
      "altitude": 157,
      "latitude": 50.679427,
      "type": "gps",
      "timestamp": 3806.895129144192,
      "longitude": 18.005605
    },
    {
      "altitude": 156.9090909090909,
      "latitude": 50.679404,
      "type": "gps",
      "timestamp": 3810.919521927834,
      "longitude": 18.005759
    },
    {
      "altitude": 156.8181818181818,
      "latitude": 50.679375,
      "type": "gps",
      "timestamp": 3814.921536386013,
      "longitude": 18.005901
    },
    {
      "altitude": 156.72727272727272,
      "latitude": 50.679335,
      "type": "gps",
      "timestamp": 3818.919403910637,
      "longitude": 18.006041
    },
    {
      "altitude": 156.63636363636363,
      "latitude": 50.679306,
      "type": "gps",
      "timestamp": 3822.93130427599,
      "longitude": 18.006186
    },
    {
      "altitude": 156.54545454545453,
      "latitude": 50.679277,
      "type": "gps",
      "timestamp": 3826.90153503418,
      "longitude": 18.006334
    },
    {
      "altitude": 156.45454545454547,
      "latitude": 50.679246,
      "type": "gps",
      "timestamp": 3830.919351279736,
      "longitude": 18.006482
    },
    {
      "altitude": 156.36363636363637,
      "latitude": 50.679186,
      "type": "gps",
      "timestamp": 3834.92324000597,
      "longitude": 18.006611
    },
    {
      "altitude": 156.27272727272728,
      "latitude": 50.679143,
      "type": "gps",
      "timestamp": 3838.915789484978,
      "longitude": 18.006751
    },
    {
      "altitude": 156.1818181818182,
      "latitude": 50.679103,
      "type": "gps",
      "timestamp": 3842.914768397808,
      "longitude": 18.006897
    },
    {
      "altitude": 156.0909090909091,
      "latitude": 50.679071,
      "type": "gps",
      "timestamp": 3846.918971478939,
      "longitude": 18.007046
    },
    {
      "altitude": 156,
      "latitude": 50.679036,
      "type": "gps",
      "timestamp": 3850.922750532627,
      "longitude": 18.007189
    },
    {
      "altitude": 156,
      "latitude": 50.679001,
      "type": "gps",
      "timestamp": 3854.921368122101,
      "longitude": 18.00733
    },
    {
      "altitude": 156,
      "latitude": 50.678966,
      "type": "gps",
      "timestamp": 3858.912559270859,
      "longitude": 18.007469
    },
    {
      "altitude": 156,
      "latitude": 50.678929,
      "type": "gps",
      "timestamp": 3862.884685814381,
      "longitude": 18.007611
    },
    {
      "altitude": 156,
      "latitude": 50.678893,
      "type": "gps",
      "timestamp": 3866.888993263245,
      "longitude": 18.00775
    },
    {
      "altitude": 156,
      "latitude": 50.678852,
      "type": "gps",
      "timestamp": 3870.917597413063,
      "longitude": 18.007889
    },
    {
      "altitude": 156,
      "latitude": 50.678825,
      "type": "gps",
      "timestamp": 3874.917586803436,
      "longitude": 18.008036
    },
    {
      "altitude": 156,
      "latitude": 50.678794,
      "type": "gps",
      "timestamp": 3878.924696087837,
      "longitude": 18.008187
    },
    {
      "altitude": 156,
      "latitude": 50.678753,
      "type": "gps",
      "timestamp": 3882.917862474918,
      "longitude": 18.008328
    },
    {
      "altitude": 156,
      "latitude": 50.678718,
      "type": "gps",
      "timestamp": 3886.916157901287,
      "longitude": 18.00847
    },
    {
      "altitude": 156,
      "latitude": 50.67868,
      "type": "gps",
      "timestamp": 3890.935343444347,
      "longitude": 18.008601
    },
    {
      "altitude": 156,
      "latitude": 50.67864,
      "type": "gps",
      "timestamp": 3894.913139283657,
      "longitude": 18.008735
    },
    {
      "altitude": 156,
      "latitude": 50.67861,
      "type": "gps",
      "timestamp": 3898.926809430122,
      "longitude": 18.008876
    },
    {
      "altitude": 156,
      "latitude": 50.678578,
      "type": "gps",
      "timestamp": 3902.925979018211,
      "longitude": 18.009017
    },
    {
      "altitude": 156,
      "latitude": 50.678543,
      "type": "gps",
      "timestamp": 3906.930159747601,
      "longitude": 18.009154
    },
    {
      "altitude": 156,
      "latitude": 50.678519,
      "type": "gps",
      "timestamp": 3910.918445706367,
      "longitude": 18.009295
    },
    {
      "altitude": 156,
      "latitude": 50.678484,
      "type": "gps",
      "timestamp": 3915.9293296337128,
      "longitude": 18.009459
    },
    {
      "altitude": 156,
      "latitude": 50.678436,
      "type": "gps",
      "timestamp": 3919.912897109985,
      "longitude": 18.009589
    },
    {
      "altitude": 156,
      "latitude": 50.678386,
      "type": "gps",
      "timestamp": 3923.92546993494,
      "longitude": 18.009724
    },
    {
      "altitude": 156.36363636363637,
      "latitude": 50.678303,
      "type": "gps",
      "timestamp": 3927.918361902237,
      "longitude": 18.009817
    },
    {
      "altitude": 156.72727272727272,
      "latitude": 50.678216,
      "type": "gps",
      "timestamp": 3931.924874126911,
      "longitude": 18.009893
    },
    {
      "altitude": 157.0909090909091,
      "latitude": 50.678124,
      "type": "gps",
      "timestamp": 3935.92397993803,
      "longitude": 18.009964
    },
    {
      "altitude": 157.45454545454547,
      "latitude": 50.678037,
      "type": "gps",
      "timestamp": 3939.913295507431,
      "longitude": 18.010033
    },
    {
      "altitude": 157.8181818181818,
      "latitude": 50.677949,
      "type": "gps",
      "timestamp": 3943.930884540081,
      "longitude": 18.010107
    },
    {
      "altitude": 158.1818181818182,
      "latitude": 50.677869,
      "type": "gps",
      "timestamp": 3947.916052639484,
      "longitude": 18.010184
    },
    {
      "altitude": 158.54545454545453,
      "latitude": 50.677782,
      "type": "gps",
      "timestamp": 3951.927620410919,
      "longitude": 18.010257
    },
    {
      "altitude": 158.9090909090909,
      "latitude": 50.677724,
      "type": "gps",
      "timestamp": 3955.909311234951,
      "longitude": 18.010387
    },
    {
      "altitude": 159.27272727272728,
      "latitude": 50.677743,
      "type": "gps",
      "timestamp": 3959.891435861588,
      "longitude": 18.010533
    },
    {
      "altitude": 159.63636363636363,
      "latitude": 50.677774,
      "type": "gps",
      "timestamp": 3963.907733857632,
      "longitude": 18.010676
    },
    {
      "altitude": 160,
      "latitude": 50.677791,
      "type": "gps",
      "timestamp": 3968.91966855526,
      "longitude": 18.010846
    },
    {
      "altitude": 160,
      "latitude": 50.677838,
      "type": "gps",
      "timestamp": 3972.6933375597,
      "longitude": 18.010977
    },
    {
      "altitude": 160,
      "latitude": 50.677884,
      "type": "gps",
      "timestamp": 3976.919529080391,
      "longitude": 18.011111
    },
    {
      "altitude": 160,
      "latitude": 50.677906,
      "type": "gps",
      "timestamp": 3981.917073607445,
      "longitude": 18.011282
    },
    {
      "altitude": 160,
      "latitude": 50.67786,
      "type": "gps",
      "timestamp": 3985.923591375351,
      "longitude": 18.011425
    },
    {
      "altitude": 160,
      "latitude": 50.677832,
      "type": "gps",
      "timestamp": 3989.895764231682,
      "longitude": 18.011584
    },
    {
      "altitude": 160,
      "latitude": 50.677785,
      "type": "gps",
      "timestamp": 3993.886053681374,
      "longitude": 18.011707
    },
    {
      "altitude": 160,
      "latitude": 50.677737,
      "type": "gps",
      "timestamp": 3998.925296902657,
      "longitude": 18.011836
    },
    {
      "altitude": 160,
      "latitude": 50.677652,
      "type": "gps",
      "timestamp": 4003.927553653717,
      "longitude": 18.011892
    },
    {
      "altitude": 160,
      "latitude": 50.677562,
      "type": "gps",
      "timestamp": 4007.913462340832,
      "longitude": 18.011825
    },
    {
      "altitude": 160,
      "latitude": 50.677479,
      "type": "gps",
      "timestamp": 4011.874328136444,
      "longitude": 18.011741
    },
    {
      "altitude": 160,
      "latitude": 50.677381,
      "type": "gps",
      "timestamp": 4015.907834768295,
      "longitude": 18.011694
    },
    {
      "altitude": 160,
      "latitude": 50.677287,
      "type": "gps",
      "timestamp": 4019.895298421383,
      "longitude": 18.011638
    },
    {
      "altitude": 160,
      "latitude": 50.677201,
      "type": "gps",
      "timestamp": 4023.901140511036,
      "longitude": 18.01159
    },
    {
      "altitude": 160,
      "latitude": 50.67711,
      "type": "gps",
      "timestamp": 4027.884219408035,
      "longitude": 18.011555
    },
    {
      "altitude": 160.36363636363637,
      "latitude": 50.677017,
      "type": "gps",
      "timestamp": 4031.882326900959,
      "longitude": 18.01151
    },
    {
      "altitude": 160.72727272727272,
      "latitude": 50.676925,
      "type": "gps",
      "timestamp": 4035.913658559322,
      "longitude": 18.011468
    },
    {
      "altitude": 161.0909090909091,
      "latitude": 50.676834,
      "type": "gps",
      "timestamp": 4039.918097674847,
      "longitude": 18.01141
    },
    {
      "altitude": 161.45454545454547,
      "latitude": 50.676745,
      "type": "gps",
      "timestamp": 4043.892608344555,
      "longitude": 18.011343
    },
    {
      "altitude": 161.72727272727272,
      "latitude": 50.676658,
      "type": "gps",
      "timestamp": 4047.905672848225,
      "longitude": 18.01129
    },
    {
      "altitude": 162,
      "latitude": 50.676561,
      "type": "gps",
      "timestamp": 4051.879478931427,
      "longitude": 18.011238
    },
    {
      "altitude": 161.8181818181818,
      "latitude": 50.676472,
      "type": "gps",
      "timestamp": 4055.890239417553,
      "longitude": 18.011187
    },
    {
      "altitude": 161.63636363636363,
      "latitude": 50.676381,
      "type": "gps",
      "timestamp": 4059.919132053852,
      "longitude": 18.011168
    },
    {
      "altitude": 161.45454545454547,
      "latitude": 50.676287,
      "type": "gps",
      "timestamp": 4063.940236449242,
      "longitude": 18.011121
    },
    {
      "altitude": 161.27272727272728,
      "latitude": 50.676194,
      "type": "gps",
      "timestamp": 4067.924600243568,
      "longitude": 18.011053
    },
    {
      "altitude": 161.0909090909091,
      "latitude": 50.676103,
      "type": "gps",
      "timestamp": 4072.930022776127,
      "longitude": 18.011134
    },
    {
      "altitude": 160.54545454545453,
      "latitude": 50.676088,
      "type": "gps",
      "timestamp": 4076.890493512154,
      "longitude": 18.011299
    },
    {
      "altitude": 160,
      "latitude": 50.676059,
      "type": "gps",
      "timestamp": 4080.901062190533,
      "longitude": 18.01146
    },
    {
      "altitude": 159.45454545454547,
      "latitude": 50.676021,
      "type": "gps",
      "timestamp": 4084.88322353363,
      "longitude": 18.011618
    },
    {
      "altitude": 158.9090909090909,
      "latitude": 50.675979,
      "type": "gps",
      "timestamp": 4088.903188169003,
      "longitude": 18.011775
    },
    {
      "altitude": 158.45454545454547,
      "latitude": 50.67594,
      "type": "gps",
      "timestamp": 4092.903350114822,
      "longitude": 18.011931
    },
    {
      "altitude": 158,
      "latitude": 50.6759,
      "type": "gps",
      "timestamp": 4096.8945378661165,
      "longitude": 18.012083
    },
    {
      "altitude": 157.9090909090909,
      "latitude": 50.675862,
      "type": "gps",
      "timestamp": 4100.8838601112375,
      "longitude": 18.01224
    },
    {
      "altitude": 157.8181818181818,
      "latitude": 50.675829,
      "type": "gps",
      "timestamp": 4104.893384933473,
      "longitude": 18.012397
    },
    {
      "altitude": 157.72727272727272,
      "latitude": 50.675797,
      "type": "gps",
      "timestamp": 4108.920194029808,
      "longitude": 18.01255
    },
    {
      "altitude": 157.63636363636363,
      "latitude": 50.675766,
      "type": "gps",
      "timestamp": 4112.9230293631545,
      "longitude": 18.012702
    },
    {
      "altitude": 157.54545454545453,
      "latitude": 50.675735,
      "type": "gps",
      "timestamp": 4116.898788988589,
      "longitude": 18.012854
    },
    {
      "altitude": 157.45454545454547,
      "latitude": 50.675703,
      "type": "gps",
      "timestamp": 4120.889054119587,
      "longitude": 18.013015
    },
    {
      "altitude": 157.36363636363637,
      "latitude": 50.675664,
      "type": "gps",
      "timestamp": 4124.890773534775,
      "longitude": 18.013169
    },
    {
      "altitude": 157.27272727272728,
      "latitude": 50.675637,
      "type": "gps",
      "timestamp": 4128.8804671764365,
      "longitude": 18.013324
    },
    {
      "altitude": 157.27272727272728,
      "latitude": 50.675607,
      "type": "gps",
      "timestamp": 4132.9023027420035,
      "longitude": 18.013475
    },
    {
      "altitude": 157.27272727272728,
      "latitude": 50.675581,
      "type": "gps",
      "timestamp": 4136.8961523771295,
      "longitude": 18.013621
    },
    {
      "altitude": 157.27272727272728,
      "latitude": 50.675545,
      "type": "gps",
      "timestamp": 4140.894029319285,
      "longitude": 18.013767
    },
    {
      "altitude": 157.36363636363637,
      "latitude": 50.675509,
      "type": "gps",
      "timestamp": 4144.898813307284,
      "longitude": 18.013914
    },
    {
      "altitude": 157.54545454545453,
      "latitude": 50.675473,
      "type": "gps",
      "timestamp": 4148.9162972569475,
      "longitude": 18.01406
    },
    {
      "altitude": 157.72727272727272,
      "latitude": 50.675435,
      "type": "gps",
      "timestamp": 4152.923647940159,
      "longitude": 18.014203
    },
    {
      "altitude": 157.9090909090909,
      "latitude": 50.675402,
      "type": "gps",
      "timestamp": 4156.872171521187,
      "longitude": 18.014349
    },
    {
      "altitude": 158.0909090909091,
      "latitude": 50.675366,
      "type": "gps",
      "timestamp": 4160.887642741202,
      "longitude": 18.014498
    },
    {
      "altitude": 158.27272727272728,
      "latitude": 50.675338,
      "type": "gps",
      "timestamp": 4164.888686418532,
      "longitude": 18.014649
    },
    {
      "altitude": 158.45454545454547,
      "latitude": 50.675305,
      "type": "gps",
      "timestamp": 4168.92797523737,
      "longitude": 18.014801
    },
    {
      "altitude": 158.63636363636363,
      "latitude": 50.675238,
      "type": "gps",
      "timestamp": 4172.917893826962,
      "longitude": 18.014928
    },
    {
      "altitude": 158.72727272727272,
      "latitude": 50.675159,
      "type": "gps",
      "timestamp": 4176.934476494789,
      "longitude": 18.015032
    },
    {
      "altitude": 158.8181818181818,
      "latitude": 50.675106,
      "type": "gps",
      "timestamp": 4180.924262702465,
      "longitude": 18.015158
    },
    {
      "altitude": 158.9090909090909,
      "latitude": 50.675051,
      "type": "gps",
      "timestamp": 4184.921052515508,
      "longitude": 18.015281
    },
    {
      "altitude": 159,
      "latitude": 50.674989,
      "type": "gps",
      "timestamp": 4188.921666562557,
      "longitude": 18.015407
    },
    {
      "altitude": 159,
      "latitude": 50.674899,
      "type": "gps",
      "timestamp": 4192.904620885849,
      "longitude": 18.015465
    },
    {
      "altitude": 159,
      "latitude": 50.674794,
      "type": "gps",
      "timestamp": 4196.889271855354,
      "longitude": 18.01541
    },
    {
      "altitude": 159,
      "latitude": 50.674706,
      "type": "gps",
      "timestamp": 4200.891125559807,
      "longitude": 18.01536
    },
    {
      "altitude": 159,
      "latitude": 50.67462,
      "type": "gps",
      "timestamp": 4204.888856351376,
      "longitude": 18.015307
    },
    {
      "altitude": 159,
      "latitude": 50.674522,
      "type": "gps",
      "timestamp": 4208.90011537075,
      "longitude": 18.015253
    },
    {
      "altitude": 159,
      "latitude": 50.674432,
      "type": "gps",
      "timestamp": 4212.895872354507,
      "longitude": 18.015199
    },
    {
      "altitude": 159,
      "latitude": 50.674347,
      "type": "gps",
      "timestamp": 4216.894864976406,
      "longitude": 18.015146
    },
    {
      "altitude": 158.9090909090909,
      "latitude": 50.674252,
      "type": "gps",
      "timestamp": 4220.891583323479,
      "longitude": 18.015103
    },
    {
      "altitude": 158.8181818181818,
      "latitude": 50.674163,
      "type": "gps",
      "timestamp": 4224.894850969315,
      "longitude": 18.015066
    },
    {
      "altitude": 158.72727272727272,
      "latitude": 50.67407,
      "type": "gps",
      "timestamp": 4228.877864301205,
      "longitude": 18.015014
    },
    {
      "altitude": 158.54545454545453,
      "latitude": 50.673975,
      "type": "gps",
      "timestamp": 4232.893285274506,
      "longitude": 18.014954
    },
    {
      "altitude": 158.36363636363637,
      "latitude": 50.673892,
      "type": "gps",
      "timestamp": 4236.908985733986,
      "longitude": 18.014889
    },
    {
      "altitude": 158.1818181818182,
      "latitude": 50.673811,
      "type": "gps",
      "timestamp": 4240.918677687645,
      "longitude": 18.014821
    },
    {
      "altitude": 158,
      "latitude": 50.67371,
      "type": "gps",
      "timestamp": 4245.917368650436,
      "longitude": 18.01479
    },
    {
      "altitude": 157.8181818181818,
      "latitude": 50.673623,
      "type": "gps",
      "timestamp": 4249.913979947567,
      "longitude": 18.014745
    },
    {
      "altitude": 157.63636363636363,
      "latitude": 50.673528,
      "type": "gps",
      "timestamp": 4253.893694460392,
      "longitude": 18.014697
    },
    {
      "altitude": 157.45454545454547,
      "latitude": 50.673427,
      "type": "gps",
      "timestamp": 4257.891914606094,
      "longitude": 18.014651
    },
    {
      "altitude": 157.27272727272728,
      "latitude": 50.673322,
      "type": "gps",
      "timestamp": 4261.879182100296,
      "longitude": 18.014602
    },
    {
      "altitude": 157.1818181818182,
      "latitude": 50.673228,
      "type": "gps",
      "timestamp": 4265.882097601891,
      "longitude": 18.014549
    },
    {
      "altitude": 157.0909090909091,
      "latitude": 50.673135,
      "type": "gps",
      "timestamp": 4269.8884044885635,
      "longitude": 18.014501
    },
    {
      "altitude": 157,
      "latitude": 50.673039,
      "type": "gps",
      "timestamp": 4273.896041154861,
      "longitude": 18.014455
    },
    {
      "altitude": 157,
      "latitude": 50.672951,
      "type": "gps",
      "timestamp": 4277.924357831478,
      "longitude": 18.014413
    },
    {
      "altitude": 157,
      "latitude": 50.672859,
      "type": "gps",
      "timestamp": 4281.916590511799,
      "longitude": 18.014367
    },
    {
      "altitude": 157,
      "latitude": 50.672756,
      "type": "gps",
      "timestamp": 4285.904909014702,
      "longitude": 18.014308
    },
    {
      "altitude": 157,
      "latitude": 50.672655,
      "type": "gps",
      "timestamp": 4289.921244204044,
      "longitude": 18.014268
    },
    {
      "altitude": 157.54545454545453,
      "latitude": 50.672564,
      "type": "gps",
      "timestamp": 4293.917408764362,
      "longitude": 18.014239
    },
    {
      "altitude": 158.0909090909091,
      "latitude": 50.67248,
      "type": "gps",
      "timestamp": 4297.92383491993,
      "longitude": 18.014181
    },
    {
      "altitude": 158.63636363636363,
      "latitude": 50.672384,
      "type": "gps",
      "timestamp": 4301.916054129601,
      "longitude": 18.014167
    },
    {
      "altitude": 159.1818181818182,
      "latitude": 50.672292,
      "type": "gps",
      "timestamp": 4305.917416870594,
      "longitude": 18.014098
    },
    {
      "altitude": 159.72727272727272,
      "latitude": 50.672203,
      "type": "gps",
      "timestamp": 4309.905635178089,
      "longitude": 18.014039
    },
    {
      "altitude": 160.27272727272728,
      "latitude": 50.672102,
      "type": "gps",
      "timestamp": 4314.910236895084,
      "longitude": 18.013961
    },
    {
      "altitude": 160.8181818181818,
      "latitude": 50.671993,
      "type": "gps",
      "timestamp": 4318.919620454311,
      "longitude": 18.013912
    },
    {
      "altitude": 161.27272727272728,
      "latitude": 50.671888,
      "type": "gps",
      "timestamp": 4322.923757135868,
      "longitude": 18.013926
    },
    {
      "altitude": 161.72727272727272,
      "latitude": 50.671841,
      "type": "gps",
      "timestamp": 4326.924447774887,
      "longitude": 18.014078
    },
    {
      "altitude": 162.1818181818182,
      "latitude": 50.671841,
      "type": "gps",
      "timestamp": 4330.890975296497,
      "longitude": 18.01426
    },
    {
      "altitude": 162.63636363636363,
      "latitude": 50.671839,
      "type": "gps",
      "timestamp": 4334.895905077457,
      "longitude": 18.014429
    },
    {
      "altitude": 162.54545454545453,
      "latitude": 50.671828,
      "type": "gps",
      "timestamp": 4338.931445360184,
      "longitude": 18.014599
    },
    {
      "altitude": 162.45454545454547,
      "latitude": 50.671815,
      "type": "gps",
      "timestamp": 4342.929398715496,
      "longitude": 18.014762
    },
    {
      "altitude": 162.36363636363637,
      "latitude": 50.671801,
      "type": "gps",
      "timestamp": 4346.946102440357,
      "longitude": 18.014929
    },
    {
      "altitude": 162.27272727272728,
      "latitude": 50.671787,
      "type": "gps",
      "timestamp": 4350.925757169724,
      "longitude": 18.015101
    },
    {
      "altitude": 162.1818181818182,
      "latitude": 50.671775,
      "type": "gps",
      "timestamp": 4354.931922733784,
      "longitude": 18.015281
    },
    {
      "altitude": 162.0909090909091,
      "latitude": 50.671762,
      "type": "gps",
      "timestamp": 4358.925974845886,
      "longitude": 18.015446
    },
    {
      "altitude": 161.9090909090909,
      "latitude": 50.671744,
      "type": "gps",
      "timestamp": 4362.92759591341,
      "longitude": 18.015609
    },
    {
      "altitude": 161.8181818181818,
      "latitude": 50.671734,
      "type": "gps",
      "timestamp": 4366.928582370281,
      "longitude": 18.015766
    },
    {
      "altitude": 161.72727272727272,
      "latitude": 50.671721,
      "type": "gps",
      "timestamp": 4370.921610236168,
      "longitude": 18.015927
    },
    {
      "altitude": 161.63636363636363,
      "latitude": 50.671706,
      "type": "gps",
      "timestamp": 4374.924192845821,
      "longitude": 18.016085
    },
    {
      "altitude": 161.54545454545453,
      "latitude": 50.671697,
      "type": "gps",
      "timestamp": 4378.929881334305,
      "longitude": 18.016242
    },
    {
      "altitude": 161.45454545454547,
      "latitude": 50.671693,
      "type": "gps",
      "timestamp": 4382.935334265232,
      "longitude": 18.016411
    },
    {
      "altitude": 161.36363636363637,
      "latitude": 50.671686,
      "type": "gps",
      "timestamp": 4386.927208542824,
      "longitude": 18.016579
    },
    {
      "altitude": 161.27272727272728,
      "latitude": 50.671675,
      "type": "gps",
      "timestamp": 4390.912843763828,
      "longitude": 18.016744
    },
    {
      "altitude": 161.1818181818182,
      "latitude": 50.671666,
      "type": "gps",
      "timestamp": 4394.928189277649,
      "longitude": 18.016913
    },
    {
      "altitude": 161.0909090909091,
      "latitude": 50.671656,
      "type": "gps",
      "timestamp": 4398.891191780567,
      "longitude": 18.017083
    },
    {
      "altitude": 160.9090909090909,
      "latitude": 50.67165,
      "type": "gps",
      "timestamp": 4402.903445839882,
      "longitude": 18.01725
    },
    {
      "altitude": 160.8181818181818,
      "latitude": 50.671639,
      "type": "gps",
      "timestamp": 4406.892355084419,
      "longitude": 18.017425
    },
    {
      "altitude": 160.72727272727272,
      "latitude": 50.671634,
      "type": "gps",
      "timestamp": 4410.894069731236,
      "longitude": 18.017603
    },
    {
      "altitude": 160.63636363636363,
      "latitude": 50.671626,
      "type": "gps",
      "timestamp": 4414.907238006592,
      "longitude": 18.017772
    },
    {
      "altitude": 160.54545454545453,
      "latitude": 50.671619,
      "type": "gps",
      "timestamp": 4418.92092692852,
      "longitude": 18.017941
    },
    {
      "altitude": 160.45454545454547,
      "latitude": 50.671619,
      "type": "gps",
      "timestamp": 4422.928286015987,
      "longitude": 18.018104
    },
    {
      "altitude": 160.36363636363637,
      "latitude": 50.671604,
      "type": "gps",
      "timestamp": 4426.928476333618,
      "longitude": 18.018262
    },
    {
      "altitude": 160.27272727272728,
      "latitude": 50.671593,
      "type": "gps",
      "timestamp": 4430.923777461052,
      "longitude": 18.018425
    },
    {
      "altitude": 160.1818181818182,
      "latitude": 50.67157,
      "type": "gps",
      "timestamp": 4434.925312399864,
      "longitude": 18.018596
    },
    {
      "altitude": 160.0909090909091,
      "latitude": 50.671545,
      "type": "gps",
      "timestamp": 4438.920779168606,
      "longitude": 18.018761
    },
    {
      "altitude": 160,
      "latitude": 50.671518,
      "type": "gps",
      "timestamp": 4442.925777316093,
      "longitude": 18.018925
    },
    {
      "altitude": 160,
      "latitude": 50.671497,
      "type": "gps",
      "timestamp": 4446.920828223228,
      "longitude": 18.019094
    },
    {
      "altitude": 160,
      "latitude": 50.671477,
      "type": "gps",
      "timestamp": 4450.922716915607,
      "longitude": 18.019252
    },
    {
      "altitude": 160,
      "latitude": 50.67147,
      "type": "gps",
      "timestamp": 4454.918303906918,
      "longitude": 18.019421
    },
    {
      "altitude": 160,
      "latitude": 50.671464,
      "type": "gps",
      "timestamp": 4458.928476989269,
      "longitude": 18.019595
    },
    {
      "altitude": 160,
      "latitude": 50.67144,
      "type": "gps",
      "timestamp": 4462.924957573414,
      "longitude": 18.019753
    },
    {
      "altitude": 160,
      "latitude": 50.671444,
      "type": "gps",
      "timestamp": 4466.919949948788,
      "longitude": 18.019931
    },
    {
      "altitude": 160,
      "latitude": 50.671437,
      "type": "gps",
      "timestamp": 4470.920350909233,
      "longitude": 18.020111
    },
    {
      "altitude": 160,
      "latitude": 50.67143,
      "type": "gps",
      "timestamp": 4474.917378544807,
      "longitude": 18.02029
    },
    {
      "altitude": 159.9090909090909,
      "latitude": 50.671433,
      "type": "gps",
      "timestamp": 4478.930175662041,
      "longitude": 18.020477
    },
    {
      "altitude": 159.8181818181818,
      "latitude": 50.671424,
      "type": "gps",
      "timestamp": 4482.919393122196,
      "longitude": 18.020651
    },
    {
      "altitude": 159.72727272727272,
      "latitude": 50.671408,
      "type": "gps",
      "timestamp": 4486.908551633358,
      "longitude": 18.02082
    },
    {
      "altitude": 159.63636363636363,
      "latitude": 50.671407,
      "type": "gps",
      "timestamp": 4490.909270226955,
      "longitude": 18.020987
    },
    {
      "altitude": 159.54545454545453,
      "latitude": 50.67138,
      "type": "gps",
      "timestamp": 4494.92448413372,
      "longitude": 18.021156
    },
    {
      "altitude": 159.45454545454547,
      "latitude": 50.67136,
      "type": "gps",
      "timestamp": 4498.939580917358,
      "longitude": 18.02133
    },
    {
      "altitude": 159.36363636363637,
      "latitude": 50.67136,
      "type": "gps",
      "timestamp": 4502.907122790813,
      "longitude": 18.021496
    },
    {
      "altitude": 159.27272727272728,
      "latitude": 50.671354,
      "type": "gps",
      "timestamp": 4506.883941411972,
      "longitude": 18.021661
    },
    {
      "altitude": 159.1818181818182,
      "latitude": 50.671341,
      "type": "gps",
      "timestamp": 4510.888918876648,
      "longitude": 18.021828
    },
    {
      "altitude": 159.0909090909091,
      "latitude": 50.671331,
      "type": "gps",
      "timestamp": 4514.920319259167,
      "longitude": 18.021995
    },
    {
      "altitude": 158.9090909090909,
      "latitude": 50.67132,
      "type": "gps",
      "timestamp": 4518.929106354713,
      "longitude": 18.022162
    },
    {
      "altitude": 158.8181818181818,
      "latitude": 50.671326,
      "type": "gps",
      "timestamp": 4522.912695169449,
      "longitude": 18.022332
    },
    {
      "altitude": 158.72727272727272,
      "latitude": 50.671333,
      "type": "gps",
      "timestamp": 4525.915552318096,
      "longitude": 18.022486
    },
    {
      "altitude": 158.63636363636363,
      "latitude": 50.671346,
      "type": "gps",
      "timestamp": 4528.89441806078,
      "longitude": 18.022656
    },
    {
      "altitude": 158.54545454545453,
      "latitude": 50.671358,
      "type": "gps",
      "timestamp": 4531.900223553181,
      "longitude": 18.022823
    },
    {
      "altitude": 158.45454545454547,
      "latitude": 50.671364,
      "type": "gps",
      "timestamp": 4534.893991947174,
      "longitude": 18.022973
    },
    {
      "altitude": 158.4,
      "latitude": 50.671376,
      "type": "gps",
      "timestamp": 4538.894778609276,
      "longitude": 18.023141
    },
    {
      "altitude": 158.33333333333334,
      "latitude": 50.671401,
      "type": "gps",
      "timestamp": 4542.892591297626,
      "longitude": 18.023289
    },
    {
      "altitude": 158.25,
      "latitude": 50.671494,
      "type": "gps",
      "timestamp": 4546.929290473461,
      "longitude": 18.023371
    },
    {
      "altitude": 158.14285714285714,
      "latitude": 50.671575,
      "type": "gps",
      "timestamp": 4550.936728358269,
      "longitude": 18.023477
    },
    {
      "altitude": 158,
      "latitude": 50.671595,
      "type": "end",
      "timestamp": 4553.9596910476685,
      "longitude": 18.023614
    }
  ],
  "nearest_teammate_nutrition": [
    "/nearestMeasurement/NUTRITION/14094608/1462208167000",
    "/nearestMeasurement/NUTRITION/47734780/1462208167000",
    "/nearestMeasurement/NUTRITION/50913669/1462208167000"
  ],
  "nearest_teammate_diabetes": [
    "/nearestMeasurement/DIABETES/14094608/1462208167000",
    "/nearestMeasurement/DIABETES/47734780/1462208167000",
    "/nearestMeasurement/DIABETES/50913669/1462208167000"
  ],
  "total_distance": 11704.9871165417,
  "share": "Everyone",
  "nearest_general_measurement": "/nearestMeasurement/GENERAL/47734780/1462208167000",
  "nearest_diabetes": "/nearestMeasurement/DIABETES/47734780/1462208167000",
  "nearest_weight": "/nearestMeasurement/WEIGHT/47734780/1462208167000",
  "images": [
    {
      "latitude": 50.694366,
      "thumbnail_uri": "https://d38gl3mpd8okug.cloudfront.net/6rnyvsoBHAPJmVJI9y66Ezpg_small.jpg",
      "uri": "https://d38gl3mpd8okug.cloudfront.net/6rnyvsoBHAPJmVJI9y66Ezpg.jpg",
      "longitude": 17.963104,
      "timestamp": -4994
    },
    {
      "latitude": 50.694366,
      "thumbnail_uri": "https://d38gl3mpd8okug.cloudfront.net/2RZ9BaRNe3PRktIdHiqQMAKM_small.jpg",
      "uri": "https://d38gl3mpd8okug.cloudfront.net/2RZ9BaRNe3PRktIdHiqQMAKM.jpg",
      "longitude": 17.963104,
      "timestamp": -4980
    },
    {
      "latitude": 50.694366,
      "thumbnail_uri": "https://d38gl3mpd8okug.cloudfront.net/FZvH8hwzmzNJowYnFGZyjd62_small.jpg",
      "uri": "https://d38gl3mpd8okug.cloudfront.net/FZvH8hwzmzNJowYnFGZyjd62.jpg",
      "longitude": 17.963104,
      "timestamp": -4967
    },
    {
      "latitude": 50.694287,
      "thumbnail_uri": "https://d38gl3mpd8okug.cloudfront.net/o399JNJZrw38sri8ssUr2eWe_small.jpg",
      "uri": "https://d38gl3mpd8okug.cloudfront.net/o399JNJZrw38sri8ssUr2eWe.jpg",
      "longitude": 17.963179,
      "timestamp": -4955
    }
  ],
  "comments": "/fitnessActivities/779895346/comments",
  "nearest_teammate_weight": [
    "/nearestMeasurement/WEIGHT/14094608/1462208167000",
    "/nearestMeasurement/WEIGHT/47734780/1462208167000",
    "/nearestMeasurement/WEIGHT/50913669/1462208167000"
  ],
  "previous": "/prevFitnessActivity/47734780/1462208167000",
  "total_calories": 956,
  "nearest_strength_training_activity": "/nearestStrengthTrainingActivity/47734780/1462208167000",
  "nearest_teammate_strength_training_activities": [
    "/nearestStrengthTrainingActivity/14094608/1462208167000",
    "/nearestStrengthTrainingActivity/47734780/1462208167000",
    "/nearestStrengthTrainingActivity/50913669/1462208167000"
  ],
  "equipment": "None",
  "heart_rate": [],
  "nearest_sleep": "/nearestMeasurement/SLEEP/47734780/1462208167000",
  "calories": [],
  "uri": "/fitnessActivities/779895346",
  "start_time": "Mon, 2 May 2016 16:56:07",
  "nearest_background_activity": "/nearestMeasurement/BACKGROUND_ACTIVITY/47734780/1462208167000",
  "nearest_teammate_general_measurements": [
    "/nearestMeasurement/GENERAL/14094608/1462208167000",
    "/nearestMeasurement/GENERAL/47734780/1462208167000",
    "/nearestMeasurement/GENERAL/50913669/1462208167000"
  ],
  "tracking_mode": "outdoor",
  "is_live": false,
  "nearest_teammate_fitness_activities": [
    "/nearestFitnessActivity/14094608/1462208167000",
    "/nearestFitnessActivity/47734780/1462208167000",
    "/nearestFitnessActivity/50913669/1462208167000"
  ]
}', true);
    }
}
