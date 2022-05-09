<template>
	<div class="shadowwrapper m-auto pl-2 pr-2 pl-lg-0 pr-lg-0">
		<div class="contentwraper w-100 d-inline-block pt-3 pb-4 pl-0 pr-0 mt-3">
			<h5 class="mainfontcolor mb-3 w-100 d-inline-block">タスクを検索</h5>
			<form action="https://localhost:8081/taskinfo" class="d-inline-block w-100 overflow-hidden" method="get">
				<div class="mb-3 w-100 d-inline-block">
					<div class="tablediv tabledivleft col-6 col-md-6 float-left pl-2">
						担当者名
					</div>
					<div class="tablediv bg-white col-6 col-md-6 float-right pl-0 pr-0" id="inchargewrapper">
						<div class="w-100 d-inline-block cursor text-white pl-2" id="selectincharge">
							担当者を選択する <small class="text-white" id="selectwhich"></small>
						</div>
						<div class="inchargemenu w-100 d-inline-block position-absolute inchargemenuclose">
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="">
								すべて
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="4:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="6:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="8:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="10:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="12:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="14:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="16:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="18:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="20:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="22:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="24:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="26:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="28:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="30:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="32:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="34:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="36:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="38:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="40:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="42:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="44:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="46:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="48:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="50:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="52:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="54:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="56:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="58:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="60:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="62:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="64:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="66:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="68:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="70:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="72:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="74:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="76:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="78:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="80:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="82:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="84:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="86:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="88:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="90:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="92:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="94:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="96:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="98:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="100:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="102:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="104:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="106:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="108:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="110:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="112:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="114:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="116:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="118:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="120:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="122:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="124:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="126:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="128:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="130:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="132:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="134:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="136:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="138:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="140:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="142:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="144:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="146:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="148:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="150:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="152:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="154:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="156:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="158:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="160:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="162:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="164:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="166:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="168:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="170:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="172:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="174:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="176:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="178:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="180:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="182:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="184:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="186:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="188:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="190:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="192:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="194:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="196:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="198:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="200:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="202:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="204:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="206:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="208:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="210:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="212:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="214:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="216:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="218:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="220:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="222:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="224:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="226:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="228:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="230:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="232:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="234:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="236:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="238:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="240:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="242:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="244:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="246:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="248:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="250:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="252:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="254:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="256:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="258:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="260:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="262:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="264:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="266:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="268:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="270:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="272:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="274:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="276:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="278:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="280:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="282:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="284:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="286:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="288:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="290:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="292:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="294:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="296:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="298:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="300:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="302:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="304:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="306:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="308:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="310:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="312:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="314:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="316:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="318:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="320:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="322:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="324:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="326:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="328:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="330:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="332:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="334:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="336:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="338:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="340:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="342:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="344:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="346:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="348:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="350:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="352:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="354:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="356:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="358:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="360:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="362:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="364:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="366:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="368:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="370:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="372:名前1">
								名前1
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="374:名前3">
								名前3
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="376:名前5">
								名前5
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="378:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="380:名前4">
								名前4
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="382:名前2">
								名前2
							</div>
							<div class="w-100 d-inline-block cursor pl-2 inchargeinner" data-incharge="384:名前4">
								名前4
							</div><input name="selectincharge" type="hidden" value="">
						</div>
					</div>
				</div>
				<div class="mb-3 w-100 d-inline-block">
					<div class="d-flex tablediv bg-white col-12 col-md-5 float-md-left mb-4 pl-0">
						<input class="w-100 d-inline-block" name="deadlinebeginyear" type="text" value="">
						<div class="text-center">
							年
						</div><input class="w-100 d-inline-block" name="deadlinebeginmonth" type="text" value="">
						<div class="text-center">
							月
						</div><input class="w-100 d-inline-block" name="deadlinebegindate" type="text" value="">
						<div class="text-center">
							日
						</div>
					</div>
					<div class="tablediv col-12 col-md-1 float-md-left d-inline-block pl-2">
						〜
					</div>
					<div class="d-flex tablediv bg-white col-12 col-md-5 float-md-left mb-4 pl-0">
						<input class="w-100 d-inline-block" name="deadlineendyear" type="text" value="">
						<div class="text-center">
							年
						</div><input class="w-100 d-inline-block" name="deadlineendmonth" type="text" value="">
						<div class="text-center">
							月
						</div><input class="w-100 d-inline-block" name="deadlineenddate" type="text" value="">
						<div class="text-center">
							日
						</div>
					</div>
					<div class="float-right float-lg-left d-inline-block pl-2"><img class="searchicon cursor mt-1 p-1 tooltip-top" data-tooltip="入力を取り消す" id="delete_date_area" src=""></div>
				</div>
				<div class="mb-3 d-flex w-100">
					<div class="pr-3 w-100">
						<div class="searchbarwrapper mt-0">
							<input class="w-100 searchbar bg-brightgray border-top-left-radius-1rem border-bottom-left-radius-1rem border-top-right-radius-1rem border-bottom-right-radius-1rem b-none float-left pl-2" name="searchTaskTitle" placeholder="キーワードを入力してください。" type="text" value="">
						</div>
					</div><input class="searchicon" src="" type="image" value="検索">
				</div>
			</form>
			<div class="">
				<div class="w-100 d-inline-block mt-3" id="TaskDisplayArea">

					<div class="gridinside d-inline-block w-100 mb-3 bg-white position-relative">
						<div class="d-inline-block w-100 pt-3 pb-3 pr-2 pl-2 overflow-hidden">
							<div class="col-12 col-md-4 float-left p-2">
								<div class="tooltip-top float-left cursor" data-tooltip="タスク名">
                  <img class="searchicon d-inline-block" src="">
                </div>
                <span class="d-inline-block position-absolute font-lg-12 col-10">タスク名2</span>
							</div>
							<div class="col-12 col-md-4 float-left p-2">
								<div class="tooltip-top float-left cursor" data-tooltip="担当者">
                  <img class="searchicon d-inline-block" src="">
                </div>
                <span class="d-inline-block position-absolute font-lg-12 col-10">ユーザー名2</span>
							</div>
							<div class="col-12 col-md-4 float-left p-2">
								<div class="tooltip-top float-left cursor" data-tooltip="グループ">
                  <img class="searchicon d-inline-block" src="">
                </div>
                <span class="d-inline-block position-absolute font-lg-12 col-10">グループ名2</span>
							</div>
							<div class="col-12 col-md-4 float-left p-2">
								<div class="tooltip-top float-left cursor" data-tooltip="期日">
                  <img class="searchicon d-inline-block" src="">
                </div>
                <span class="col-10 float-left"><span class="taskinfoalertare d-inline-block float-left ml-2 font-lg-12 w-100 pr-0 pl-0">期限切れ</span> <span class="taskinfostr deadlinestr d-inline-block float-left ml-2 font-lg-12 w-100 pr-0 pl-0 red">2020-05-06</span></span>
							</div>
							<div class="col-12 col-md-4 float-left p-2">
								<div class="tooltip-top float-left cursor" data-tooltip="ステータス">
                  <img class="searchicon d-inline-block" src="">
                </div>
                <span class="d-inline-block position-absolute font-lg-12 col-10">未</span>
							</div>
						</div>
						<div class="d-inline-block w-100 p2px">
							<div class="d-inline-block w-100 position-relative p-2 bg-white">
								<div class="col-12 col-md-6 col-lg-2 float-left pl-0 pr-0">
									<a class="BgAccentColor text-white cursor p-2 p-lg-1 d-inline-block text-center mb-0 float-left w-100" data-taskid="2" href="">詳細ページへ</a>
								</div>
								<div class="d-inline-block col-12 float-left pl-0 pr-0 mt-2">
									<div class="searchicon tooptip-top float-right cursor" data-tooltip="担当者にメッセージを送る">
                    <img class="d-inline-block w-100" id="SendMsgUserButton-2" src="">
                  </div>
                  <span class="font-lg-12 d-inline-block pt-2 pb-2 text-right loat-left">依頼日: <span class="FontAccent">2020-02-06</span></span>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="w-100 d-flex col-md-6 m-auto pt-3" id="PageNationNumArea">
				<nav>
					<ul class="pagination">
						<li aria-disabled="true" aria-label="« Previous" class="page-item disabled"><span aria-hidden="true" class="page-link">‹</span></li>
						<li class="page-item active"><span class="page-link">1</span></li>
						<li class="page-item">
							<a class="page-link" href="https://localhost:8081/taskinfo?page=2">2</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="https://localhost:8081/taskinfo?page=3">3</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="https://localhost:8081/taskinfo?page=4">4</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="https://localhost:8081/taskinfo?page=5">5</a>
						</li>
						<li class="page-item">
							<a aria-label="Next »" class="page-link" href="https://localhost:8081/taskinfo?page=2" rel="next">›</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'TaskInfoView',
  props: {
    msg: String,
  },
});
</script>