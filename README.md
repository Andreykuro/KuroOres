# ⛏️ KuroOres

![KuroOres Logo](KuroOres.png)

KuroOres is a lightweight and stable **PocketMine-MP 5.x plugin** that enhances cobblestone generators by turning them into custom ore generators.

Instead of always producing cobblestone, generators now have a chance to produce valuable ores like coal, iron, gold, redstone, lapis, emerald, and even diamond.

---

## ✨ Features

* 🔄 Converts cobblestone into random ores
* ⚖️ Balanced probability system
* ⚡ Optimized for stability (no crashes)
* 🧠 Works without interfering with Minecraft physics
* 🧩 Fully compatible with **PocketMine-MP 5.x**
* 🛠️ Easy to modify and extend

---

## 📊 Default Ore Chances

| Ore          | Chance |
| ------------ | ------ |
| Cobblestone  | 50%    |
| Coal Ore     | 20%    |
| Iron Ore     | 15%    |
| Gold Ore     | 7%     |
| Redstone Ore | 4%     |
| Lapis Ore    | 2%     |
| Emerald Ore  | 1%     |
| Diamond Ore  | 1%     |

---

## 🚀 How It Works

Instead of hooking into unstable block formation events, KuroOres:

1. Detects newly formed cobblestone near players
2. Safely replaces it using a scheduler
3. Avoids modifying core game mechanics

➡️ Result: **No crashes, no lag spikes, fully stable gameplay**

---

## 📦 Installation

1. Download the plugin
2. Place it in your `/plugins/` folder
3. Restart your server

---

## 🙏 Credits

This plugin was inspired by the original concept of **Ore Generators** from:

* **OreGen** (original idea and concept)
https://github.com/Xenophilicy/OreGen

Huge credit to them for the inspiration behind this project ❤️

---

## 🧠 Developer Notes

* Built for performance and stability on Aternos & PMMP servers
* Uses safe block replacement (no physics interference)
* Designed to avoid common PMMP 5.x crashes

---

## 📜 License

This project is open-source. Feel free to modify and improve it.

---

## 💬 Support

If you find bugs or want new features:

* Open an issue
* Or contribute to the project

---

### 🔥 KuroOres — Making cobblestone generators actually worth using.
